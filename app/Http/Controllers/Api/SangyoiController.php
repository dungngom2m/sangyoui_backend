<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SangyoiCollection;
use App\Http\Resources\SangyoiDetailResource;
use App\Http\Resources\SangyoiMachingNgCollection;
use App\Http\Resources\SangyoiPaymentCollection;
use App\Http\Resources\SangyoiPaymentDetail2Resource;
use App\Http\Resources\SangyoiPaymentDetailPdf2Collection;
use App\Http\Resources\SangyoiPaymentDetailPdfResource;
use App\Http\Resources\SangyoiPaymentDetailResource;
use App\Http\Resources\SangyoiPaymentNoticeCollection;
use App\Http\Resources\SangyoiScheduleCollection;
use App\Imports\SangyoisImport;
use App\Mail\RegistAccountSangyoiEmail;
use App\Mail\RegistAccountSangyoiPassword;
use App\Models\MClient;
use App\Models\MGensenZeiritsu;
use App\Models\MMachingNg;
use App\Models\MSangyoi;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TSangyoiSchedule;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Jubaer\Zoom\Facades\Zoom;

class SangyoiController extends Controller
{
    private const sex = [
        [
            'label' => '男性',
            'id' => 1
        ],
        [
            'label' => '女性',
            'id' => 2
        ]
    ];

    public const shozokuKbn = [
        [
            'label' => '所属医療機関名',
            'id' => 1
        ],
        [
            'label' => '所属会社名',
            'id' => 2
        ],
        [
            'label' => '個人事業主',
            'id' => 3
        ],
        [
            'label' => 'なし',
            'id' => 4
        ],
    ];

    public const keiyakuKbn = [
        [
            'label' => '業務委託(法人)',
            'id' => 1
        ],
        [
            'label' => '業務委託(個人事業主)',
            'id' => 2
        ],
        [
            'label' => '雇用契約',
            'id' => 3
        ]
    ];

    private const kyuyoKbn = [
        [
            'label' => '業務委託',
            'id' => 0
        ],
        [
            'label' => '給与',
            'id' => 1
        ]
    ];

    private const price = [
        [
            'label' => '変更しない',
            'id' => 0
        ],
        [
            'label' => '変更する',
            'id' => 1
        ]
    ];

    private const sangyoiExperience = [
        [
            'label' => '10年以上',
            'id' => 0
        ],
        [
            'label' => '5年以上',
            'id' => 1
        ],
        [
            'label' => '2年以上',
            'id' => 2
        ],
        [
            'label' => '1年以上',
            'id' => 3
        ],
        [
            'label' => '未経験',
            'id' => 4
        ]
    ];

    private const counselingExperience = [
        [
            'label' => '100件以上',
            'id' => 0
        ],
        [
            'label' => '50件以上',
            'id' => 1
        ],
        [
            'label' => '10件以上',
            'id' => 2
        ],
        [
            'label' => '10件未満',
            'id' => 3
        ],
        [
            'label' => 'なし',
            'id' => 4
        ]
    ];

    private const clinicalExperience = [
        [
            'label' => '10年以上',
            'id' => 0
        ],
        [
            'label' => '5年以上',
            'id' => 1
        ],
        [
            'label' => '2年以上',
            'id' => 2
        ],
        [
            'label' => '1年以上',
            'id' => 3
        ],
        [
            'label' => '未経験',
            'id' => 4
        ]
    ];

    private $account;

    /**
     * Create a new SangyoiController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('user')->user();
    }

    /**
     * Display a listing of sangyoi.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'id':
                    $orderSortBy = 'id';
                    break;
                case 'nameKana':
                    $orderSortBy = 'name_kana';
                    break;
                case 'keiyakuKbn':
                    $orderSortBy = 'keiyaku_kbn';
                    break;
                case 'contactMailaddr':
                    $orderSortBy = 'contact_mailaddr';
                    break;
                case 'contactTelnumber':
                    $orderSortBy = 'contact_telnumber';
                    break;
            }

            $list = MSangyoi::join('m_user_company', function ($join) {
                            $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                            $join->whereNull('m_user_company.deleted_at');
                        })
                        ->join('m_user', function ($join) {
                            $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                            $join->whereNull('m_user.deleted_at');
                        })
                        ->where('m_user.id', $this->account->id)
                        ->where(function($query) use ($request) {
                            $query->where('m_sangyoi.id', 'LIKE', '%'.$request->keyword.'%')
                                ->orWhere('m_sangyoi.name', 'LIKE', '%'.$request->keyword.'%')
                                ->orWhere('m_sangyoi.contact_telnumber', 'LIKE', '%'.$request->keyword.'%');
                        })
                        ->select('m_sangyoi.*')
                        ->orderBy($orderSortBy, $request->orderBy)
                        ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'sangyoiList' => new SangyoiCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store sangyoi
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:100'],
                'nameKana' => ['required', 'string', 'max:100'],
                'birthday' => ['required', 'date_format:Y/m/d'],
                'sex' => ['required', 'string', 'max:1'],
                'postNumber' => ['required', 'string', 'max:7'],
                'chiikiCd' => ['required', 'integer'],
                'todofuken' => ['required', 'string', 'max:100'],
                'shikucyoson' => ['required', 'string', 'max:100'],
                'tatemono' => ['max:100'],
                'heyabango' => ['max:100'],
                'shoruiFlg' => ['max:1'],
                'shoruiPostNumber' => ['max:7'],
                'shoruiTodofuken' => ['max:100'],
                'shoruiShikucyoson' => ['max:100'],
                'shoruiTatemono' => ['max:100'],
                'shoruiHeyabango' => ['max:100'],
                'contactMailaddr' => [
                    'required', 'string', 'max:255' ,
                    function($attribute, $value, $onFailure) use ($request) {
                        $query = MSangyoi::where('contact_mailaddr', $request->contactMailaddr)->first();
                        if ($query) {
                            $onFailure(__('validation.unique', ['attribute' => '連絡先メールアドレス']));
                        }
                    }
                ],
                'contactTelnumber' => ['required', 'string', 'max:11'],
                'shozokuKbn' => ['required', 'integer'],
                'shozoku' => ['max:100'],
                'shozokuBusho' => ['max:100'],
                'clinicalDepartment' => ['required', 'string', 'max:100'],
                'keiyakuKbn' => ['required', 'integer'],
                'kyuyoKbn' => ['required', 'integer'],
                'price1' => ['required', 'integer'],
                'price2' => ['required', 'integer'],
                'ginkoName' => ['required', 'string', 'max:100'],
                'ginkoShitenName' => ['required', 'string', 'max:100'],
                'ginkoShitenNameKana' => ['required', 'string', 'max:100'],
                'kozaType' => ['required', 'string', 'max:1'],
                'kozaNameKana' => ['required', 'string', 'max:100'],
                'kozaNumber' => ['required', 'string', 'max:7'],
                'invoiceNumber' => ['max:14'],
                'shoushoNumber' => ['required', 'string', 'max:100'],
                'nihonishiLicenseFlg' => ['required', 'string', 'max:1'],
                'sangyoiDiplomaLicenseFlg' => ['required', 'string', 'max:1'],
                'consultantLicenseFlg' => ['required', 'string', 'max:1'],
                'otherLicenseFlg' => ['required', 'string', 'max:1'],
                'otherLicenseMemo' => ['max:1000'],
                'sangyoiExperience' => ['required', 'integer'],
                'counselingExperience' => ['required', 'integer'],
                'clinicalExperience' => ['required', 'integer'],
                'zoomAccountId' => ['required', 'string', 'max:23'],
                'zoomClientId' => ['required', 'string', 'max:23'],
                'zoomClientSecret' => ['required', 'string', 'max:33'],
                'zoomMailaddr' => ['required', 'string', 'max:255'],
                'memo' => ['max:1000'],
                'shoushoFilePath' => ['required']
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'name' => '氏名',
                'nameKana' => '氏名ふりがな',
                'birthday' => '生年月日',
                'sex' => '性別',
                'postNumber' => '郵便番号',
                'chiikiCd' => '地域コード',
                'todofuken' => '都道府県',
                'shikucyoson' => '市区町村ほか',
                'tatemono' => '建物名',
                'heyabango' => '部屋番号',
                'shoruiFlg' => '書類送付先有無フラグ',
                'shoruiPostNumber' => '書類送付先郵便番号',
                'shoruiTodofuken' => '書類送付先都道府県',
                'shoruiShikucyoson' => '書類送付先市区町村ほか',
                'shoruiTatemono' => '書類送付先建物名',
                'shoruiHeyabango' => '書類送付先部屋番号',
                'contactMailaddr' => '連絡先メールアドレス',
                'contactTelnumber' => '連絡先携帯番号',
                'shozokuKbn' => '所属区分',
                'shozoku' => '所属',
                'shozokuBusho' => '所属部署',
                'clinicalDepartment' => '主たる専門科目',
                'keiyakuKbn' => '希望契約形態区分',
                'kyuyoKbn' => '給与体系区分',
                'price1' => '料金1回目',
                'price2' => '料金2回目以降',
                'ginkoName' => '銀行名',
                'ginkoShitenName' => '銀行支店名',
                'ginkoShitenNameKana' => '銀行支店名（カナ）',
                'kozaType' => '口座種類',
                'kozaNameKana' => '口座名義（カナ）',
                'kozaNumber' => '口座番号',
                'invoiceNumber' => 'インボイス番号',
                'shoushoNumber' => '研修修了証書番号',
                'nihonishiLicenseFlg' => '日本医師会認定産業医免許保有フラグ',
                'sangyoiDiplomaLicenseFlg' => '産業医ディプロマ免許保有フラグ',
                'consultantLicenseFlg' => '労働衛生コンサルタント免許保有フラグ',
                'otherLicenseFlg' => 'その他免許保有フラグ',
                'otherLicenseMemo' => 'その他免許保有備考',
                'sangyoiExperience' => '産業医実務経験',
                'counselingExperience' => '長時間労働者面接実績',
                'clinicalExperience' => '臨床経験',
                'zoomAccountId' => 'ZoomAccountID',
                'zoomClientId' => 'ZoomClientID',
                'zoomClientSecret' => 'ZoomClientSecret',
                'zoomMailaddr' => 'Zoomメールアドレス',
                'memo' => '備考',
                'shoushoFilePath' => '面接指導実施医師認定証ファイルパス'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $zoom = $this->createZoomMeeting($request->zoomClientId, $request->zoomClientSecret, $request->zoomAccountId);
            $meetingId = $zoom['data']['id'];

            if (isset($meetingId)) {
                Zoom::deleteMeeting($meetingId);
            }

            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $password = uniqid();
            $account = auth()->guard('user')->user();

            $sangyoi = new MSangyoi();
            $sangyoi->name = $request->name;
            $sangyoi->name_kana = $request->nameKana;
            $sangyoi->birthday = $request->birthday;
            $sangyoi->sex = $request->sex;
            $sangyoi->post_number = $request->postNumber;
            $sangyoi->chiiki_cd = $request->chiikiCd;
            $sangyoi->todofuken = $request->todofuken;
            $sangyoi->shikucyoson = $request->shikucyoson;
            $sangyoi->tatemono = $request->tatemono ?? null;
            $sangyoi->heyabango = $request->heyabango ?? null;
            $sangyoi->shorui_flg = $request->shoruiFlg ?? null;
            $sangyoi->shorui_post_number = $request->shoruiPostNumber ?? null;
            $sangyoi->shorui_todofuken = $request->shoruiTodofuken ?? null;
            $sangyoi->shorui_shikucyoson = $request->shoruiShikucyoson ?? null;
            $sangyoi->shorui_heyabango = $request->shoruiHeyabango ?? null;
            $sangyoi->shorui_tatemono = $request->shoruiTatemono ?? null;
            $sangyoi->contact_mailaddr = $request->contactMailaddr;
            $sangyoi->contact_telnumber = $request->contactTelnumber;
            $sangyoi->shozoku_kbn = $request->shozokuKbn;
            $sangyoi->shozoku = $request->shozoku ?? null;
            $sangyoi->shozoku_busho = $request->shozokuBusho ?? null;
            $sangyoi->clinical_department = $request->clinicalDepartment;
            $sangyoi->keiyaku_kbn = $request->keiyakuKbn;
            $sangyoi->kyuyo_kbn = $request->kyuyoKbn;
            $sangyoi->price_1 = $request->price1;
            $sangyoi->price_2 = $request->price2;
            $sangyoi->ginko_name = $request->ginkoName;
            $sangyoi->ginko_shiten_name = $request->ginkoShitenName;
            $sangyoi->ginko_shiten_name_kana = $request->ginkoShitenNameKana;
            $sangyoi->koza_type = $request->kozaType;
            $sangyoi->koza_name_kana = $request->kozaNameKana;
            $sangyoi->koza_number = $request->kozaNumber;
            $sangyoi->invoice_number = $request->invoiceNumber ?? null;
            $sangyoi->shousho_number = $request->shoushoNumber;
            $sangyoi->nihonishi_license_flg = $request->nihonishiLicenseFlg;
            $sangyoi->sangyoi_diploma_license_flg = $request->sangyoiDiplomaLicenseFlg;
            $sangyoi->consultant_license_flg = $request->consultantLicenseFlg;
            $sangyoi->other_license_flg = $request->otherLicenseFlg;
            $sangyoi->other_license_memo = $request->otherLicenseMemo ?? null;
            $sangyoi->sangyoi_experience = $request->sangyoiExperience;
            $sangyoi->counseling_experience = $request->counselingExperience;
            $sangyoi->clinical_experience = $request->clinicalExperience;
            $sangyoi->zoom_account_id = $request->zoomAccountId;
            $sangyoi->zoom_client_id = $request->zoomClientId;
            $sangyoi->zoom_client_secret = $request->zoomClientSecret;
            $sangyoi->zoom_mailaddr = $request->zoomMailaddr;
            $sangyoi->memo = $request->memo ?? null;
            $sangyoi->password = Hash::make($password);
            $sangyoi->user_company_id = $account->user_company_id;
            $sangyoi->regist_id = $account->id;
            $sangyoi->update_id = $account->id;

            $shoushoFilePath = json_decode($request->shoushoFilePath);

            $sangyoi->shousho_file_path = $shoushoFilePath->key;

            $sangyoi->save();

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

            return $this->response(200, [
                'sangyoi' => new SangyoiDetailResource($sangyoi)
            ], __('text.store_succeed', ['attribute' => '産業医']));
        } catch (\Exception $ex) {
            if (str_contains($ex->getMessage(), 'zoom')) {
                return $this->response(422, [], __('text.invalid_zoom'));
            }
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => '産業医']));
        }
    }

    /**
     * Update sangyoi.
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:100'],
                'nameKana' => ['required', 'string', 'max:100'],
                'birthday' => ['required', 'date_format:Y/m/d'],
                'sex' => ['required', 'string', 'max:1'],
                'postNumber' => ['required', 'string', 'max:7'],
                'chiikiCd' => ['required', 'integer'],
                'todofuken' => ['required', 'string', 'max:100'],
                'shikucyoson' => ['required', 'string', 'max:100'],
                'tatemono' => ['max:100'],
                'heyabango' => ['max:100'],
                'shoruiFlg' => ['max:1'],
                'shoruiPostNumber' => ['max:7'],
                'shoruiTodofuken' => ['max:100'],
                'shoruiShikucyoson' => ['max:100'],
                'shoruiTatemono' => ['max:100'],
                'shoruiHeyabango' => ['max:100'],
                'contactMailaddr' => [
                    'required', 'string', 'max:255' ,
                    function($attribute, $value, $onFailure) use ($request, $id) {
                        $query = MSangyoi::where('contact_mailaddr', $request->contactMailaddr)->where('id', '!=', $id)->first();
                        if ($query) {
                            $onFailure(__('validation.unique', ['attribute' => '連絡先メールアドレス']));
                        }
                    }
                ],
                'contactTelnumber' => ['required', 'string', 'max:11'],
                'shozokuKbn' => ['required', 'integer'],
                'shozoku' => ['max:100'],
                'shozokuBusho' => ['max:100'],
                'clinicalDepartment' => ['required', 'string', 'max:100'],
                'keiyakuKbn' => ['required', 'integer'],
                'kyuyoKbn' => ['required', 'integer'],
                'price1' => ['required', 'integer'],
                'price2' => ['required', 'integer'],
                'ginkoName' => ['required', 'string', 'max:100'],
                'ginkoShitenName' => ['required', 'string', 'max:100'],
                'ginkoShitenNameKana' => ['required', 'string', 'max:100'],
                'kozaType' => ['required', 'string', 'max:1'],
                'kozaNameKana' => ['required', 'string', 'max:100'],
                'kozaNumber' => ['required', 'string', 'max:7'],
                'invoiceNumber' => ['max:14'],
                'shoushoNumber' => ['required', 'string', 'max:100'],
                'nihonishiLicenseFlg' => ['required', 'string', 'max:1'],
                'sangyoiDiplomaLicenseFlg' => ['required', 'string', 'max:1'],
                'consultantLicenseFlg' => ['required', 'string', 'max:1'],
                'otherLicenseFlg' => ['required', 'string', 'max:1'],
                'otherLicenseMemo' => ['max:1000'],
                'sangyoiExperience' => ['required', 'integer'],
                'counselingExperience' => ['required', 'integer'],
                'clinicalExperience' => ['required', 'integer'],
                'zoomAccountId' => ['required', 'string', 'max:23'],
                'zoomClientId' => ['required', 'string', 'max:23'],
                'zoomClientSecret' => ['required', 'string', 'max:33'],
                'zoomMailaddr' => ['required', 'string', 'max:255'],
                'memo' => ['max:1000']
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'name' => '氏名',
                'nameKana' => '氏名ふりがな',
                'birthday' => '生年月日',
                'sex' => '性別',
                'postNumber' => '郵便番号',
                'chiikiCd' => '地域コード',
                'todofuken' => '都道府県',
                'shikucyoson' => '市区町村ほか',
                'tatemono' => '建物名',
                'heyabango' => '部屋番号',
                'shoruiFlg' => '書類送付先有無フラグ',
                'shoruiPostNumber' => '書類送付先郵便番号',
                'shoruiTodofuken' => '書類送付先都道府県',
                'shoruiShikucyoson' => '書類送付先市区町村ほか',
                'shoruiTatemono' => '書類送付先建物名',
                'shoruiHeyabango' => '書類送付先部屋番号',
                'contactMailaddr' => '連絡先メールアドレス',
                'contactTelnumber' => '連絡先携帯番号',
                'shozokuKbn' => '所属区分',
                'shozoku' => '所属',
                'shozokuBusho' => '所属部署',
                'clinicalDepartment' => '主たる専門科目',
                'keiyakuKbn' => '希望契約形態区分',
                'kyuyoKbn' => '給与体系区分',
                'price1' => '料金1回目',
                'price2' => '料金2回目以降',
                'ginkoName' => '銀行名',
                'ginkoShitenName' => '銀行支店名',
                'ginkoShitenNameKana' => '銀行支店名（カナ）',
                'kozaType' => '口座種類',
                'kozaNameKana' => '口座名義（カナ）',
                'kozaNumber' => '口座番号',
                'invoiceNumber' => 'インボイス番号',
                'shoushoNumber' => '研修修了証書番号',
                'nihonishiLicenseFlg' => '日本医師会認定産業医免許保有フラグ',
                'sangyoiDiplomaLicenseFlg' => '産業医ディプロマ免許保有フラグ',
                'consultantLicenseFlg' => '労働衛生コンサルタント免許保有フラグ',
                'otherLicenseFlg' => 'その他免許保有フラグ',
                'otherLicenseMemo' => 'その他免許保有備考',
                'sangyoiExperience' => '産業医実務経験',
                'counselingExperience' => '長時間労働者面接実績',
                'clinicalExperience' => '臨床経験',
                'zoomAccountId' => 'ZoomAccountID',
                'zoomClientId' => 'ZoomClientID',
                'zoomClientSecret' => 'ZoomClientSecret',
                'zoomMailaddr' => 'Zoomメールアドレス',
                'memo' => '備考',
                'shoushoFilePath' => '面接指導実施医師認定証ファイルパス'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $zoom = $this->createZoomMeeting($request->zoomClientId, $request->zoomClientSecret, $request->zoomAccountId);
            $meetingId = $zoom['data']['id'];

            if (isset($meetingId)) {
                Zoom::deleteMeeting($meetingId);
            }

            $account = auth()->guard('user')->user();

            $sangyoi = MSangyoi::findOrFail($id);
            $sangyoi->name = $request->name;
            $sangyoi->name_kana = $request->nameKana;
            $sangyoi->birthday = $request->birthday;
            $sangyoi->sex = $request->sex;
            $sangyoi->post_number = $request->postNumber;
            $sangyoi->chiiki_cd = $request->chiikiCd;
            $sangyoi->todofuken = $request->todofuken;
            $sangyoi->shikucyoson = $request->shikucyoson;
            $sangyoi->tatemono = $request->tatemono ?? null;
            $sangyoi->heyabango = $request->heyabango ?? null;
            $sangyoi->shorui_flg = $request->shoruiFlg ?? null;
            $sangyoi->shorui_post_number = $request->shoruiPostNumber ?? null;
            $sangyoi->shorui_todofuken = $request->shoruiTodofuken ?? null;
            $sangyoi->shorui_shikucyoson = $request->shoruiShikucyoson ?? null;
            $sangyoi->shorui_heyabango = $request->shoruiHeyabango ?? null;
            $sangyoi->shorui_tatemono = $request->shoruiTatemono ?? null;
            $sangyoi->contact_mailaddr = $request->contactMailaddr;
            $sangyoi->contact_telnumber = $request->contactTelnumber;
            $sangyoi->shozoku_kbn = $request->shozokuKbn;
            $sangyoi->shozoku = $request->shozoku ?? null;
            $sangyoi->shozoku_busho = $request->shozokuBusho ?? null;
            $sangyoi->clinical_department = $request->clinicalDepartment;
            $sangyoi->keiyaku_kbn = $request->keiyakuKbn;
            $sangyoi->kyuyo_kbn = $request->kyuyoKbn;
            $sangyoi->price_1 = $request->price1;
            $sangyoi->price_2 = $request->price2;
            $sangyoi->ginko_name = $request->ginkoName;
            $sangyoi->ginko_shiten_name = $request->ginkoShitenName;
            $sangyoi->ginko_shiten_name_kana = $request->ginkoShitenNameKana;
            $sangyoi->koza_type = $request->kozaType;
            $sangyoi->koza_name_kana = $request->kozaNameKana;
            $sangyoi->koza_number = $request->kozaNumber;
            $sangyoi->invoice_number = $request->invoiceNumber ?? null;
            $sangyoi->shousho_number = $request->shoushoNumber;
            $sangyoi->nihonishi_license_flg = $request->nihonishiLicenseFlg;
            $sangyoi->sangyoi_diploma_license_flg = $request->sangyoiDiplomaLicenseFlg;
            $sangyoi->consultant_license_flg = $request->consultantLicenseFlg;
            $sangyoi->other_license_flg = $request->otherLicenseFlg;
            $sangyoi->other_license_memo = $request->otherLicenseMemo ?? null;
            $sangyoi->sangyoi_experience = $request->sangyoiExperience;
            $sangyoi->counseling_experience = $request->counselingExperience;
            $sangyoi->clinical_experience = $request->clinicalExperience;
            $sangyoi->zoom_account_id = $request->zoomAccountId;
            $sangyoi->zoom_client_id = $request->zoomClientId;
            $sangyoi->zoom_client_secret = $request->zoomClientSecret;
            $sangyoi->zoom_mailaddr = $request->zoomMailaddr;
            $sangyoi->memo = $request->memo ?? null;

            $sangyoi->update_id = $account->id;

            $shoushoFilePath = json_decode($request->shoushoFilePath);

            if (isset($shoushoFilePath) && $sangyoi->shousho_file_path) {
                Storage::disk('s3')->delete($sangyoi->shousho_file_path);
            }

            $sangyoi->shousho_file_path = isset($shoushoFilePath) ? $shoushoFilePath->key : $sangyoi->shousho_file_path;

            $sangyoi->save();

            return $this->response(200, [
                'sangyoi' => new SangyoiDetailResource($sangyoi)
            ], __('text.update_succeed', ['attribute' => '産業医']));
        } catch (\Exception $ex) {
            if (str_contains($ex->getMessage(), 'zoom')) {
                return $this->response(422, [], __('text.invalid_zoom'));
            }
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => '産業医']));
        }
    }

    /**
     * Show sangyoi.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            $sangyoi = MSangyoi::findOrFail($id);

            return $this->response(200, [
                'sangyoi' => new SangyoiDetailResource($sangyoi)
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Get select, radio option.
     * @return \Illuminate\Http\JsonResponse
     */
    public function option() {
        try {
            $option = [
                'sex' => self::sex,
                'chiikiCd' => parent::chiikiCd,
                'shozokuKbn' => self::shozokuKbn,
                'keiyakuKbn' => self::keiyakuKbn,
                'kyuyoType' => self::kyuyoKbn,
                'price' => self::price,
                'kozaType' => parent::kozaType,
                'sangyoiExperience' => self::sangyoiExperience,
                'counselingExperience' => self::counselingExperience,
                'clinicalExperience' => self::clinicalExperience
            ];

            return $this->response(200, [
                'option' => $option,
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Download excel.
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadExcel() {
        try {
            if (Storage::disk("s3")->exists("downloads/産業医データ一括取込.xlsx")) {
                return Storage::disk("s3")->download("downloads/産業医データ一括取込.xlsx");
            }
            return $this->response(200, [], __('text.download_failed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.download_failed'));
        }
    }

        /**
     * Upload excel.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadExcel(Request $request) {
        try {
            DB::beginTransaction();
            $now = Carbon::now();
            $path = '';
            $account = auth()->guard('user')->user();

            $excelFile = json_decode($request->excelFile);

            if (isset($excelFile)) {
                $path = $excelFile->key;

                if ($path) {
                    Excel::import(
                        new SangyoisImport($account->id),
                        $path,
                        "s3",
                        \Maatwebsite\Excel\Excel::XLSX
                    );
                }
            }

            DB::commit();
            return $this->response(200, [
                'path' => $path
            ], __('text.import_succeed', ['attribute' => '一括登録']));
        } catch (ValidationException $ex) {
            DB::rollBack();
            $failures = $ex->failures();
            foreach ($failures as $failure) {
                $error = __('text.row_error', ['row' => $failure->row()]) . $failure->errors()[0];
                return $this->response(400, [], $error);
            }
        } catch (ErrorException $ex) {
            DB::rollBack();
            return $this->response(400, [], $ex->getMessage());
        } catch (\Exception $ex) {
            DB::rollBack();
            if (str_contains($ex->getMessage(), 'Zoom')) {
                return $this->response(422, [], $ex->getMessage());
            }
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.import_failed', ['attribute' => '一括登録']));
        }
    }

    /**
     * Sangyoi payment summary list.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentSummaryIndex(Request $request) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'shozokuKbn':
                    $orderSortBy = 'shozoku_kbn';
                    break;
            }

            $sangyoiList = MSangyoi::join('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.doctor_id', '=', 'm_sangyoi.id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->join('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.sangyoi_schedule_id', '=', 't_sangyoi_schedule.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->join('m_user_company', function ($join) {
                                    $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                                    $join->whereNull('m_user_company.deleted_at');
                                })
                                ->join('m_user', function ($join) {
                                    $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                                    $join->whereNull('m_user.deleted_at');
                                })
                                ->join('t_report_hospital', function ($join) {
                                    $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                    $join->whereNull('t_report_hospital.deleted_at');
                                })
                                ->where('t_report_hospital.report_status', 1)
                                ->where('m_user.id', $this->account->id)
                                ->where(function ($query) use ($firstDate, $endDate) {
                                    $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                        ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                })
                                ->where(function($query) use ($request) {
                                    $query->where('m_sangyoi.name', 'LIKE', '%'.$request->keyword.'%')
                                        ->orWhere('m_user_company.user_company_name', 'LIKE', '%'.$request->keyword.'%');
                                })
                                ->select(
                                    'm_sangyoi.id as id',
                                    'm_sangyoi.shozoku_kbn as shozoku_kbn',
                                    'm_sangyoi.shozoku as shozoku',
                                    'm_sangyoi.name as name',
                                    'm_sangyoi.name_kana as name_kana',
                                    'm_sangyoi.created_at as created_at',
                                    'm_sangyoi.updated_at as updated_at',
                                    DB::raw("count(t_counseling_reserve.reserve_issue_id) as count"),
                                    DB::raw('SUM(t_counseling_reserve.price) AS sum')
                                )
                                ->orderBy($orderSortBy, $request->orderBy)
                                ->groupBy('m_sangyoi.id')
                                ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'sangyoiList' => new SangyoiPaymentCollection($sangyoiList)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Counseling reserve notice list.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentSummaryDetail(Request $request, $id) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $sangyoiDetail = MSangyoi::join('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.doctor_id', '=', 'm_sangyoi.id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->join('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.sangyoi_schedule_id', '=', 't_sangyoi_schedule.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->join('t_report_hospital', function ($join) {
                                    $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                    $join->whereNull('t_report_hospital.deleted_at');
                                })
                                ->where('t_report_hospital.report_status', 1)
                                ->where('m_sangyoi.id', $id)
                                ->where(function ($query) use ($firstDate, $endDate) {
                                    $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                        ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                })
                                ->select(
                                    'm_sangyoi.id as id', 'm_sangyoi.name as name',
                                    'm_sangyoi.contact_telnumber as contact_telnumber',
                                    'm_sangyoi.ginko_name as ginko_name',
                                    'm_sangyoi.koza_type as koza_type',
                                    'm_sangyoi.ginko_shiten_name as ginko_shiten_name',
                                    'm_sangyoi.ginko_shiten_name_kana as ginko_shiten_name_kana',
                                    'm_sangyoi.koza_name_kana as koza_name_kana',
                                    'm_sangyoi.koza_number as koza_number',
                                    DB::raw("count(t_counseling_reserve.reserve_issue_id) as count"),
                                    // DB::raw('SUM(t_counseling_reserve.price) AS sum'),
                                    DB::raw('SUM(CASE WHEN t_counseling_reserve.reserve_status = 0 OR
                                        t_counseling_reserve.reserve_status = 1 OR
                                        (t_counseling_reserve.reserve_status = 2 AND t_counseling_reserve.cancel_person_type = 0 AND t_counseling_reserve.reserve_date <= t_counseling_reserve.cancel_date)
                                        THEN t_counseling_reserve.price ELSE 0 END) AS sum'
                                    ),
                                )
                                ->groupBy('m_sangyoi.id')
                                ->first();

            foreach(parent::kozaType as $koza) {
                if (isset($sangyoiDetail->koza_type) && $sangyoiDetail->koza_type == $koza['id']) {
                    $sangyoiDetail->koza_type = $koza['label'];
                    break;
                }
            }

            $notices = TCounselingReserveNotice::join('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->join('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->join('m_client_employee', function ($join) {
                                    $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                    $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                    $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                    $join->whereNull('m_client_employee.deleted_at');
                                })
                                ->join('m_client', function ($join) {
                                    $join->on('m_client.id', '=', 't_counseling_reserve_notice.client_id');
                                    $join->whereNull('m_client.deleted_at');
                                })
                                // ->leftJoin('t_report_general', function ($join) {
                                //     $join->on('t_report_general.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                //     $join->whereNull('t_report_general.deleted_at');
                                // })
                                ->join('t_report_hospital', function ($join) {
                                    $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                    $join->whereNull('t_report_hospital.deleted_at');
                                })
                                ->where('t_report_hospital.report_status', 1)
                                ->where('t_sangyoi_schedule.doctor_id', $id)
                                ->where(function ($query) use ($firstDate, $endDate) {
                                    $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                        ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                })
                                ->where(function ($query) {
                                    $query->where('t_counseling_reserve.reserve_status', 0)
                                        ->orWhere('t_counseling_reserve.reserve_status', 1)
                                        ->orWhere(function ($query) {
                                            $query->where('t_counseling_reserve.reserve_status', 2)
                                                  ->where('t_counseling_reserve.cancel_person_type', '=', 0)
                                                  ->whereColumn('t_counseling_reserve.reserve_date', '<=', 't_counseling_reserve.cancel_date');
                                        });
                                })
                                ->select(
                                    't_counseling_reserve.id as id',
                                    'm_client.client_name as client_name',
                                    'm_client_employee.name as employee_name',
                                    't_counseling_reserve.reserve_date as reserve_date',
                                    't_counseling_reserve.reserve_time_from as reserve_time_from',
                                    't_counseling_reserve.counseling_type as counseling_type',
                                    't_counseling_reserve.price as price',
                                    // 't_report_general.updated_at as general_updated_at',
                                    't_report_hospital.updated_at as hospital_updated_at',
                                    't_counseling_reserve_notice.id as notice_id'
                                )
                                ->get();

            return $this->response(200, [
                'sangyoiDetail' => new SangyoiPaymentDetailResource($sangyoiDetail),
                'notices' => new SangyoiPaymentNoticeCollection($notices)
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Counseling reserve notice list (pdf).
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentSummaryDetailScanPdf(Request $request, $id) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $now = Carbon::create($request->reserveDate);
            $nextMonth = $now->copy()->addMonth();

            $sangyoiDetail = MSangyoi::join('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.doctor_id', '=', 'm_sangyoi.id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->join('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.sangyoi_schedule_id', '=', 't_sangyoi_schedule.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->join('m_user_company', function ($join) {
                                    $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                                    $join->whereNull('m_user_company.deleted_at');
                                })
                                ->join('t_report_hospital', function ($join) {
                                    $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                    $join->whereNull('t_report_hospital.deleted_at');
                                })
                                ->where('t_report_hospital.report_status', 1)
                                ->where('m_sangyoi.id', $id)
                                ->where(function ($query) use ($firstDate, $endDate) {
                                    $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                        ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                })
                                ->select(
                                    'm_sangyoi.id as id',
                                    'm_sangyoi.name as name',
                                    'm_sangyoi.keiyaku_kbn as keiyaku_kbn',
                                    'm_user_company.id as com_id',
                                    'm_user_company.user_company_name as user_company_name',
                                    'm_user_company.post_number as post_number',
                                    'm_user_company.todofuken as todofuken',
                                    'm_user_company.shikucyoson as shikucyoson',
                                    'm_user_company.tatemono as tatemono',
                                    'm_user_company.heyabango as heyabango',
                                    'm_user_company.tel_number as tel_number',
                                    DB::raw('SUM(t_counseling_reserve.price) AS sum')
                                )
                                ->groupBy('m_sangyoi.id', 'm_user_company.id')
                                ->first();

            foreach(parent::kozaType as $koza) {
                if (isset($sangyoiDetail->koza_type) && $sangyoiDetail->koza_type == $koza['id']) {
                    $sangyoiDetail->koza_type = $koza['label'];
                    break;
                }
            }

            $clients = TCounselingReserveNotice::join('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->join('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->join('m_client', function ($join) {
                                    $join->on('m_client.id', '=', 't_counseling_reserve_notice.client_id');
                                    $join->whereNull('m_client.deleted_at');
                                })
                                ->join('t_report_hospital', function ($join) {
                                    $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                    $join->whereNull('t_report_hospital.deleted_at');
                                })
                                ->where('t_report_hospital.report_status', 1)
                                ->where('t_sangyoi_schedule.doctor_id', $id)
                                ->where(function ($query) use ($firstDate, $endDate) {
                                    $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                        ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                })
                                ->select(
                                    'm_client.id as id',
                                    'm_client.client_name as client_name',
                                    DB::raw('SUM(CASE WHEN t_counseling_reserve.reserve_status != 2 THEN t_counseling_reserve.price ELSE 0 END) AS sum1'),
                                    DB::raw('
                                        SUM(CASE
                                            WHEN t_counseling_reserve.reserve_date = t_counseling_reserve.cancel_date
                                                AND t_counseling_reserve.reserve_status = 2
                                                AND t_counseling_reserve.cancel_person_type = 0
                                            THEN t_counseling_reserve.price
                                            ELSE 0 END) AS sum2'
                                        ),
                                )
                                ->groupBy('m_client.id')
                                ->get();

            $clientsResult = (new SangyoiPaymentDetailPdf2Collection($clients))->toArray($clients);

            $zeiRitsu = MGensenZeiritsu::first()->zei_ritsu ?? 0;

            $sum4 = (isset($sangyoiDetail->keiyaku_kbn) && $sangyoiDetail->keiyaku_kbn) != 2 ? 0 : ($clientsResult['sum1Temp'] * ($zeiRitsu/100));
            $sum5 = $clientsResult['sum1Temp'] + $clientsResult['sum2Temp'] + $clientsResult['sum3'] - $sum4;

            return $this->response(200, [
                'date' => [
                    'firstYear' => $now->format('Y'),
                    'firstMonth' => $now->format('m'),
                    'secondYear' => $nextMonth->format('Y'),
                    'secondMonth' => $nextMonth->format('m')
                ],
                'sangyoiDetail' => new SangyoiPaymentDetailPdfResource($sangyoiDetail),
                'clients' => $clientsResult,
                'sum4' => $sum4,
                'sum5' => $sum5
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Upload pdf file.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadPdf(Request $request)
    {
        try {
            $rules = [
                'pdfFile' => ['mimetypes:application/pdf', 'max:' . env('MB_PDF') ?: $_SERVER['MB_PDF']],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $now = Carbon::now();
            $path = '';
            if ($request->file('pdfFile')) {
                $path = Storage::disk('s3')->putFile("uploads/sangyoi/{$now->year}/{$now->month}/{$now->day}", $request->file('pdfFile'));
            }

            return $this->response(200, [
                'path' => $path
            ], __('text.upload_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.upload_failed'));
        }
    }

    /**
     * Show item for maching ng.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function machingNgIndex(Request $request, $id) {
        try {
            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'id':
                    $orderSortBy = 'id';
                    break;
                case 'clientCode':
                    $orderSortBy = 'client_code';
                    break;
                case 'clientName':
                    $orderSortBy = 'client_name';
                    break;
                case 'managerName1':
                    $orderSortBy = 'manager_name_1';
                    break;
                case 'telNumber':
                    $orderSortBy = 'tel_number';
                    break;
                case 'managerContactTelnumber1':
                    $orderSortBy = 'manager_contact_telnumber_1';
                    break;
            }

            $sangyoiName = MSangyoi::find($id)->name;
            $clients = MClient::orderBy($orderSortBy, $request->orderBy)
                                ->select('id', 'client_code', 'client_name', 'manager_name_1', 'tel_number', 'manager_contact_telnumber_1')
                                ->get();

            $machingNg = MMachingNg::where('sangyoi_id', $id)->get()->pluck('client_id')->toArray();

            foreach($clients as $client) {
                $client->checked = false;
                if (in_array($client->id, $machingNg)) {
                    $client->checked = true;
                }
            }

            return $this->response(200, [
                'sangyoiName' => $sangyoiName,
                'clients' => new SangyoiMachingNgCollection($clients)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store item for maching ng.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function machingNgStore(Request $request) {
        try {
            $rules = [
                'sangyoiId' => ['required', 'integer']
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'sangyoiId' => '産業医ID'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $account = auth()->guard('user')->user();

            MMachingNg::where('sangyoi_id', $request->sangyoiId)->forceDelete();

            if (count($request->clientIds) > 0) {
                foreach($request->clientIds as $clientId) {
                    $machingNg = new MMachingNg();
                    $machingNg->sangyoi_id = $request->sangyoiId;
                    $machingNg->client_id = $clientId;
                    $machingNg->regist_id = $account->id;
                    $machingNg->update_id = $account->id;
                    $machingNg->save();
                }
            }

            return $this->response(200, [
                'result' => true
            ], __('text.store_succeed', ['attribute' => 'マッチング拒否']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => 'マッチング拒否']));
        }
    }

    /**
     * Sangyoi schedule list.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function schedule(Request $request)
    {
        try {
            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'clinicalDepartment':
                    $orderSortBy = 'clinical_department';
                    break;
            }

            $list = MSangyoi::join('m_user_company', function ($join) {
                                $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                                $join->whereNull('m_user_company.deleted_at');
                            })
                            ->join('m_user', function ($join) {
                                $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                                $join->whereNull('m_user.deleted_at');
                            })
                            ->where('m_user.id', $this->account->id)
                            ->where(function ($query) use ($request) {
                                $query->where('m_user_company.user_company_name', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_sangyoi.name', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_sangyoi.contact_telnumber', 'LIKE', '%'.$request->keyword.'%');
                            })
                            ->select('m_sangyoi.*')
                            ->orderBy($orderSortBy, $request->orderBy)
                            ->get();

            $result = [];
            $dateFrom = new Carbon($request->from);

            for ($i = 0; $i < $request->count; $i++) {
                $tempDateFrom = $dateFrom->format('Y-m-d');

                // Add array - schedule
                $result = [...$result, $tempDateFrom => []];

                // Time from: 00:00 - 23:30
                $timeDateFrom = new Carbon($tempDateFrom . '00:00');
                $timeDateTo = $timeDateFrom->copy()->addDay();

                // Pluck schedule time
                $scheduleTime = TSangyoiSchedule::where('schedule_date', $tempDateFrom)
                                                ->join('m_sangyoi', function ($join) {
                                                    $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                                    $join->whereNull('m_sangyoi.deleted_at');
                                                })
                                                ->join('m_user_company', function ($join) {
                                                    $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                                                    $join->whereNull('m_user_company.deleted_at');
                                                })
                                                ->join('m_user', function ($join) {
                                                    $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                                                    $join->whereNull('m_user.deleted_at');
                                                })
                                                ->select(
                                                    't_sangyoi_schedule.reserved_flg as reserved_flg',
                                                    't_sangyoi_schedule.schedule_time_from as schedule_time_from'
                                                )
                                                ->where('m_user.id', $this->account->id);

                if (!empty($request->doctorId)) {
                    $scheduleTime->where('doctor_id', $request->doctorId);
                }

                $scheduleTime = $scheduleTime->get()->pluck('reserved_flg', 'schedule_time_from');

                // Format date to compare
                while($timeDateFrom->lessThan($timeDateTo)) {
                    // Change format to compare with pluck
                    $n = Carbon::now();
                    $testTime = (new Carbon($n->format('Y-m-d') . $timeDateFrom->format('H:i')))->format('Y-m-d H:i:s');

                    $checkTime = false;

                    if (count($scheduleTime) > 0) $checkTime = array_key_exists($testTime, $scheduleTime->toArray());

                    if ($checkTime) {
                        if ($scheduleTime[$testTime] == 0) $color = 'blue';
                        else {
                            $color = 'yellow';
                            // Change grey color with cancel counseling reserve (doctor)
                            $counselingReserve = TCounselingReserve::where('reserve_date', $tempDateFrom)
                                                                    ->where('reserve_time_from', $timeDateFrom->format('H:i'))
                                                                    ->where('cancel_delay_kbn', 0)
                                                                    ->first();
                            if (isset($counselingReserve)) {
                                $color = 'grey';
                            }
                        }
                    } else {
                        $color = 'grey';
                    }

                    array_push($result[$tempDateFrom], [
                        'date' => $tempDateFrom,
                        'time' => $timeDateFrom->format('H:i'),
                        'color' => $color,
                    ]);

                    // Add 30 minutes
                    $timeDateFrom->addMinutes(30);
                }

                // Add 1 day
                $dateFrom->addDay();
            }

            return $this->response(200, [
                'sangyoiList' => new SangyoiScheduleCollection($list),
                'schedule' => $result
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Sangyoi schedule detail.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scheduleDetail(Request $request)
    {
        try {
            $list1 = TSangyoiSchedule::join('m_sangyoi', function ($join) {
                                        $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                        $join->whereNull('m_sangyoi.deleted_at');
                                    })
                                    ->join('m_user_company', function ($join) {
                                        $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                                        $join->whereNull('m_user_company.deleted_at');
                                    })
                                    ->join('m_user', function ($join) {
                                        $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                                        $join->whereNull('m_user.deleted_at');
                                    })
                                    ->where('m_user.id', $this->account->id)
                                    ->where('schedule_date', $request->scheduleDate)
                                    ->where('schedule_time_from', $request->scheduleTimeFrom)
                                    ->where('reserved_flg', 1)
                                    ->select('m_sangyoi.name as name')
                                    ->get();

            $list0 = TSangyoiSchedule::join('m_sangyoi', function ($join) {
                                        $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                        $join->whereNull('m_sangyoi.deleted_at');
                                    })
                                    ->join('m_user_company', function ($join) {
                                        $join->on('m_user_company.id', '=', 'm_sangyoi.user_company_id');
                                        $join->whereNull('m_user_company.deleted_at');
                                    })
                                    ->join('m_user', function ($join) {
                                        $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                                        $join->whereNull('m_user.deleted_at');
                                    })
                                    ->where('m_user.id', $this->account->id)
                                    ->where('schedule_date', $request->scheduleDate)
                                    ->where('schedule_time_from', $request->scheduleTimeFrom)
                                    ->where('reserved_flg', 0)
                                    ->select('m_sangyoi.name as name')
                                    ->get();

            $timeTo = (new Carbon($request->scheduleTimeFrom))->addMinutes(30);

            return $this->response(200, [
                'date' => $request->scheduleDate,
                'timeFrom' => $request->scheduleTimeFrom,
                'timeTo' => $timeTo->format('H:i'),
                'doctorFlg1' => $list1,
                'doctorFlg0' => $list0
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }
}
