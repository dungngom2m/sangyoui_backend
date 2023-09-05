<?php

namespace App\Imports;

use App\Http\Controllers\Controller;
use App\Mail\RegistAccountSangyoiEmail;
use App\Mail\RegistAccountSangyoiPassword;
use App\Models\MClientEmployee;
use App\Models\MSangyoi;
use App\Models\MUserCompany;
use ErrorException;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Jubaer\Zoom\Facades\Zoom;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SangyoisImport implements ToCollection, WithStartRow, WithValidation, SkipsEmptyRows, WithMultipleSheets, WithChunkReading, WithBatchInserts
{
    private $accountId;

    public function __construct($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row)
        {
            $password = uniqid();

            $now = Carbon::now();

            try {
                $zoom = (new Controller())->createZoomMeeting($row[45], $row[46], $row[44]);
            } catch(\Exception $ex) {
                throw new Exception(__('text.row_error', ['row' => $key + 4]) . __('text.invalid_zoom'));
            }

            $meetingId = $zoom['data']['id'];

            if (isset($meetingId)) {
                Zoom::deleteMeeting($meetingId);
            }

            $tempStr = explode('/', $row[3]); // Y/m/d
            if(!isset($tempStr[1]) || !isset($tempStr[2])) {
                throw new ErrorException(__('text.row_error', ['row' => $key + 4]) . __('validation.date_format', ['attribute' => '生年月日', 'format' => 'Y/m/d']));
            }

            if ($tempStr[1] > 12 || $tempStr[1] < 1) {
                throw new ErrorException(__('text.row_error', ['row' => $key + 4]) . __('validation.date_format', ['attribute' => '生年月日', 'format' => 'Y/m/d']));
            }

            $tempMonth = Carbon::create($now->year . '/' . $tempStr[1] . '/1');
            if ($tempStr[2] > $tempMonth->daysInMonth) {
                throw new ErrorException(__('text.row_error', ['row' => $key + 4]) . __('validation.date_format', ['attribute' => '生年月日', 'format' => 'Y/m/d']));
            }

            if ($row[38] == 1 && $row[39] == '') {
                throw new ErrorException(__('text.row_error', ['row' => $key + 4]) . __('validation.required', ['attribute' => 'その他免許保有備考']));
            }

            $sangyoi = MSangyoi::create([
                'user_company_id' => $row[0],
                'name' => $row[1],
                'name_kana' => $row[2],
                'birthday' => $row[3],
                'sex' => $row[4],
                'post_number' => $row[5],
                'todofuken' => $row[6],
                'shikucyoson' => $row[7],
                'tatemono' => $row[8],
                'heyabango' => $row[9],
                'chiiki_cd' => $row[10],
                'shorui_flg' => $row[11],
                'shorui_post_number' => $row[12],
                'shorui_todofuken' => $row[13],
                'shorui_shikucyoson' => $row[14],
                'shorui_tatemono' => $row[15],
                'shorui_heyabango' => $row[16],
                'contact_mailaddr' => $row[17],
                'contact_telnumber' => $row[18],
                'shozoku_kbn' => $row[19],
                'shozoku' => $row[20],
                'shozoku_busho' => $row[21],
                'clinical_department' => $row[22],
                'keiyaku_kbn' => $row[23],
                'kyuyo_kbn' => $row[24],
                'price_1' => $row[25],
                'price_2' => $row[26],
                'ginko_name' => $row[27],
                'ginko_shiten_name' => $row[28],
                'ginko_shiten_name_kana' => $row[29],
                'koza_type' => $row[30],
                'koza_name_kana' => $row[31],
                'koza_number' => $row[32],
                'invoice_number' => $row[33],
                'shousho_number' => $row[34],
                'nihonishi_license_flg' => $row[35],
                'sangyoi_diploma_license_flg' => $row[36],
                'consultant_license_flg' => $row[37],
                'other_license_flg' => $row[38],
                'other_license_memo' => $row[39],
                'sangyoi_experience' => $row[40],
                'counseling_experience' => $row[41],
                'clinical_experience' => $row[42],
                'memo' => $row[43],
                'zoom_account_id' => $row[44],
                'zoom_client_id' => $row[45],
                'zoom_client_secret' => $row[46],
                'zoom_mailaddr' => $row[47],
                'regist_id' => $this->accountId,
                'update_id' => $this->accountId,
                'shousho_file_path' => '',
                'password' => Hash::make($password)
            ]);

            $url = sprintf('%s/cp/sangyoi/login/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);

            Mail::to($sangyoi->contact_mailaddr)->send(new RegistAccountSangyoiEmail([
                'mailaddr' => $sangyoi->contact_mailaddr,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'loginUrl' => $url
            ]));

            Mail::to($sangyoi->contact_mailaddr)->send(new RegistAccountSangyoiPassword([
                'password' => $password,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'loginUrl' => $url
            ]));
        }
    }

    public function startRow(): int
    {
        return 4;
    }

    // 0-46 cols
    public function rules(): array
    {
        return [
            '0' => ['required' , 'integer',
                function($attribute, $value, $onFailure) {
                    $exist = MUserCompany::find($value);
                    if (!isset($exist)) {
                        $onFailure(__('validation.not_in', ['attribute' => '利用企業ID']));
                    }
                }
            ],
            '1' => 'required|string|max:100',
            '2' => 'required|string|max:100',
            '3' => 'required',
            '4' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 1 && $value != 2 && $value != 3) {
                        $onFailure(__('validation.not_in', ['attribute' => '性別']));
                    }
                }
            ],
            '5' => 'required|max:7',
            '6' => 'required|string|max:100',
            '7' => 'required|string|max:100',
            '8' => 'nullable|max:100',
            '9' => 'nullable|max:100',
            '10' => 'required|integer',
            '11' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1) {
                        $onFailure(__('validation.not_in', ['attribute' => '書類送付先有無フラグ']));
                    }
                }
            ],
            '12' => 'nullable|max:7',
            '13' => 'nullable|max:100',
            '14' => 'nullable|max:100',
            '15' => 'nullable|max:100',
            '16' => 'nullable|max:100',
            '17' => [
                'required', 'email', 'max:255',
                function($attribute, $value, $onFailure) {
                    $query = MSangyoi::where('contact_mailaddr', $value)->first();
                    if ($query) {
                        $onFailure(__('validation.unique', ['attribute' => '連絡先メールアドレス']));
                    }
                }
            ],
            '18' => 'required|max:11',
            '19' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 1 && $value != 2 && $value != 3 && $value != 4) {
                        $onFailure(__('validation.not_in', ['attribute' => '所属区分']));
                    }
                }
            ],
            '20' => 'nullable|max:100',
            '21' => 'required|string|max:100',
            '22' => 'required|string|max:100',
            '23' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 1 && $value != 2 && $value != 3) {
                        $onFailure(__('validation.not_in', ['attribute' => '希望契約形態区分']));
                    }
                }
            ],
            '24' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1) {
                        $onFailure(__('validation.not_in', ['attribute' => '給与体系区分']));
                    }
                }
            ],
            '25' => 'required|integer',
            '26' => 'required|integer',
            '27' => 'required|string|max:100',
            '28' => 'required|string|max:100',
            '29' => 'required|string|max:100',
            '30' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1 && $value != 2) {
                        $onFailure(__('validation.not_in', ['attribute' => '口座種類']));
                    }
                }
            ],
            '31' => 'required|string|max:100',
            '32' => 'required|max:7',
            '33' => 'required|max:14',
            '34' => 'required|string|max:100',
            '35' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1) {
                        $onFailure(__('validation.not_in', ['attribute' => '日本医師会認定産業医免許保有フラグ']));
                    }
                }
            ],
            '36' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1) {
                        $onFailure(__('validation.not_in', ['attribute' => '産業医ディプロマ免許保有フラグ']));
                    }
                }
            ],
            '37' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1) {
                        $onFailure(__('validation.not_in', ['attribute' => '労働衛生コンサルタント免許保有フラグ']));
                    }
                }
            ],
            '38' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1) {
                        $onFailure(__('validation.not_in', ['attribute' => 'その他免許保有フラグ']));
                    }
                }
            ],
            '39' => 'max:1000',
            '40' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1 && $value != 2 && $value != 3 && $value != 4) {
                        $onFailure(__('validation.not_in', ['attribute' => '産業医実務経験']));
                    }
                }
            ],
            '41' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1 && $value != 2 && $value != 3 && $value != 4) {
                        $onFailure(__('validation.not_in', ['attribute' => '長時間労働者面接実績']));
                    }
                }
            ],
            '42' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 0 && $value != 1 && $value != 2 && $value != 3 && $value != 4) {
                        $onFailure(__('validation.not_in', ['attribute' => '臨床経験']));
                    }
                }
            ],
            '43' => 'nullable|max:1000',
            '44' => 'required|string|max:23',
            '45' => 'required|string|max:23',
            '46' => 'required|string|max:33',
            '47' => 'required|email|max:255'
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => '利用企業ID', // user_company_id
            '1' => '氏名', // name
            '2' => '氏名ふりがな', // name_kana
            '3' => '生年月日', // birthday
            '4' => '性別', // sex
            '5' => '郵便番号', // post_number
            '6' => '都道府県', // todofuken
            '7' => '市区町村ほか', // shikucyoson
            '8' => '建物名', // tatemono
            '9' => '部屋番号', // heyabango
            '10' => '地域コード', // chiiki_cd
            '11' => '書類送付先有無フラグ', // shorui_flg
            '12' => '書類送付先郵便番号', // shorui_post_number
            '13' => '書類送付先都道府県', // shorui_todofuken
            '14' => '書類送付先市区町村ほか', // shorui_shikucyoson
            '15' => '書類送付先建物名', // shorui_tatemono
            '16' => '書類送付先部屋番号', // shorui_heyabango
            '17' => '連絡先メールアドレス', // contact_mailaddr
            '18' => '連絡先携帯番号', // contact_telnumber
            '19' => '所属区分', // shozoku_kbn
            '20' => '所属', // shozoku
            '21' => '所属部署', // shozoku_busho
            '22' => '主たる専門科目', // clinical_department
            '23' => '希望契約形態区分', // keiyaku_kbn
            '24' => '給与体系区分', // kyuyo_kbn
            '25' => '料金1回目', // price_1
            '26' => '料金2回目以降', // price_2
            '27' => '銀行名', // ginko_name
            '28' => '銀行支店名', // ginko_shiten_name
            '29' => '銀行支店名（カナ）', // ginko_shiten_name_kana
            '30' => '口座種類', // koza_type
            '31' => '口座名義（カナ）', // koza_name_kana
            '32' => '口座番号', // koza_number
            '33' => 'インボイス番号', // invoice_number
            '34' => '研修修了証書番号', // shousho_number
            '35' => '日本医師会認定産業医免許保有フラグ', // nihonishi_license_flg
            '36' => '産業医ディプロマ免許保有フラグ', // sangyoi_diploma_license_flg
            '37' => '労働衛生コンサルタント免許保有フラグ', // consultant_license_flg
            '38' => 'その他免許保有フラグ', // other_license_flg
            '39' => 'その他免許保有備考', // other_license_memo
            '40' => '産業医実務経験', // sangyoi_experience
            '41' => '長時間労働者面接実績', // counseling_experience
            '42' => '臨床経験', // clinical_experience
            '43' => '備考', // memo
            '44' => 'ZoomAccountID', // zoom_account_id
            '45' => 'ZoomClientID', // zoom_client_id
            '46' => 'ZoomClientSecret', // zoom_client_secret
            '47' => 'Zoomメールアドレス' // zoom_mailaddr
        ];
    }
}
