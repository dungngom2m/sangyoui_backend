<?php

namespace App\Imports;

use App\Models\MClientEmployee;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use ErrorException;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientEmployeesImport implements ToCollection, WithStartRow, WithValidation, SkipsEmptyRows, WithMultipleSheets, WithChunkReading, WithBatchInserts
{
    private $clientId;
    private $userCompanyId;
    private $validationFlg;
    private $type;

    public function __construct($clientId, $userCompanyId, $validationFlg = false, $type = 'create')
    {
        $this->clientId = $clientId;
        $this->userCompanyId = $userCompanyId;
        $this->validationFlg = $validationFlg;
        $this->type = $type;
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

    public function collection(Collection $rows)
    {
        if ($this->validationFlg == true) return;

        foreach ($rows as $key => $row)
        {
            $now = Carbon::now();

            $tempStr = explode('/', $row[17]); // Y/m/d
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

            MClientEmployee::create([
                'employee_number' => $row[0],
                'name' => $row[1],
                'name_kana' => $row[2],
                'employee_type' => $row[3],
                'busho' => $row[4],
                'yakushoku' => $row[5],
                'jigyosho' => $row[6],
                'manager_id_1' => $row[7],
                'manager_name_1' => $row[8],
                'manager_id_2' => $row[9],
                'manager_name_2' => $row[10],
                'manager_id_3' => $row[11],
                'manager_name_3' => $row[12],
                'manager_id_4' => $row[13],
                'manager_name_4' => $row[14],
                'manager_id_5' => $row[15],
                'manager_name_5' => $row[16],
                'nyusha_date' => $row[17],
                'sex' => $row[18],
                'sms_number' => $row[19],
                'mailaddr' => $row[20],
                'user_company_id' => $this->userCompanyId,
                'client_id' => $this->clientId,
                'regist_id' => $this->clientId,
                'update_id' => $this->clientId,
            ]);
        }
    }

    public function startRow(): int
    {
        return 4;
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function rules(): array
    {
        return [
            '0' => [
                'required', 'string', 'max:5',
                function($attribute, $value, $onFailure) {
                    if ($this->type == 'update') {
                        $query = MClientEmployee::where('client_id', $this->clientId)
                            ->where('user_company_id', $this->userCompanyId)
                            ->where('employee_number', $value)
                            ->where('retirement_flg', 0)
                            ->first();

                        if ($query) {
                            $onFailure(__('validation.unique', ['attribute' => '社員番号']));
                        }
                    }
                }
            ],
            '1' => 'required|string|max:100',
            '2' => 'required|string|max:100',
            '3' => 'required|max:100',
            '4' => 'required|string|max:100',
            '5' => 'required|string|max:100',
            '6' => 'required|string|max:100',
            '7' => 'required|max:100',
            '8' => 'required|string|max:100',
            '9' => 'nullable|max:100',
            '10' => 'nullable|string|max:100',
            '11' => 'nullable|max:100',
            '12' => 'nullable|string|max:100',
            '13' => 'nullable|max:100',
            '14' => 'nullable|string|max:100',
            '15' => 'nullable|max:100',
            '16' => 'nullable|string|max:100',
            '17' => 'required',
            '18' => ['required', 'integer',
                function($attribute, $value, $onFailure) {
                    if ($value != 1 && $value != 2 && $value != 3) {
                        $onFailure(__('text.error_sex'));
                    }
                }
            ],
            '19' => ['required', 'max:11',
                function($attribute, $value, $onFailure) {
                    $query = MClientEmployee::where('sms_number', $value)
                        ->where('retirement_flg', 0)
                        ->first();

                    if ($query) {
                        $onFailure(__('validation.unique', ['attribute' => 'SMS用番号']));
                    }
                }
            ],
            '20' => 'max:255',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => '社員番号', // employee_number
            '1' => '氏名', // name
            '2' => 'ふりがな', // name_kana
            '3' => '従業員区分', // employee_type
            '4' => '部署', // busho
            '5' => '役職', // yakushoku
            '6' => '事業所', // jigyosho
            '7' => '上長ID_1', // manager_id_1
            '8' => '上長名_1', // manager_name_1
            '9' => '上長ID_2', // manager_id_2
            '10' => '上長名_2', // manager_name_2
            '11' => '上長ID_3', // manager_id_3
            '12' => '上長名_3', // manager_name_3
            '13' => '上長ID_4', // manager_id_4
            '14' => '上長名_4', // manager_name_4
            '15' => '上長ID_5', // manager_id_5
            '16' => '上長名_5', // manager_name_5
            '17' => '入社年月日', // nyusha_date
            '18' => '性別', // sex
            '19' => 'SMS用番号', // sms_number
            '20' => 'メールアドレス', // mailaddr
        ];
    }
}
