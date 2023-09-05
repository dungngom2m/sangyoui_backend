<?php

namespace App\Imports;

use App\Http\Controllers\Controller;
use App\Models\MClientEmployee;
use App\Models\MSangyoi;
use App\Models\TCounselingReserveNotice;
use App\Models\TWorkingTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;

class WorkingTimesImport implements ToCollection, WithStartRow, WithValidation, SkipsEmptyRows, WithMultipleSheets
{
    private $clientId;
    private $userCompanyId;
    private $year;
    private $month;
    public function __construct($clientId, $userCompanyId, $year, $month)
    {
        $this->clientId = $clientId;
        $this->userCompanyId = $userCompanyId;
        $this->year = $year;
        $this->month = $month;
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
        foreach ($rows as $row)
        {
            $working = TWorkingTime::where('user_company_code', $this->userCompanyId)
                                ->where('client_id', $this->clientId)
                                ->where('employee_number', $row[0])
                                ->where('year', $this->year)
                                ->where('month', $this->month)
                                ->first();

            if ($working) {
                $working->overtime_bef_month = $row[2];
                $working->overtime = $row[3];
                $working->save();
            } else {
                $working = TWorkingTime::create([
                    'user_company_code' => $this->userCompanyId,
                    'client_id' => $this->clientId,
                    'employee_number' => $row[0],
                    'year' => $this->year,
                    'month' => $this->month,
                    'target_month' => $this->year . '-' . $this->month . '-01',
                    'overtime_bef_month' => $row[2],
                    'overtime' => $row[3],
                    'regist_id' => $this->clientId,
                    'update_id' => $this->clientId,
                ]);
            }

            $now = Carbon::now();

            $item = TWorkingTime::join('m_client_employee', function ($join) {
                                    $join->on('m_client_employee.user_company_id', '=', 't_working_time.user_company_code');
                                    $join->on('m_client_employee.client_id', '=', 't_working_time.client_id');
                                    $join->on('m_client_employee.employee_number', '=', 't_working_time.employee_number');
                                    $join->whereNull('m_client_employee.deleted_at');
                                })
                                ->join('m_client', function ($join) {
                                    $join->on('m_client.id', '=', 't_working_time.client_id');
                                    $join->whereNull('m_client.deleted_at');
                                })
                                ->where('t_working_time.id', '=', $working->id)
                                ->where('t_working_time.year', '=', $now->year)
                                ->where('t_working_time.month', '=', $now->month)
                                ->whereRaw('t_working_time.overtime >= m_client.overtime_border')
                                ->select(
                                    't_working_time.user_company_code as user_company_id',
                                    't_working_time.client_id as client_id',
                                    't_working_time.employee_number as employee_number',
                                    'm_client_employee.sms_number as sms_number',
                                    'm_client_employee.name as name',
                                    'm_client.overtime_border as overtime_border'
                                )
                                ->first();

            $randomToken = Str::random(8);

            $employee = MClientEmployee::where('user_company_id', '=', $item->user_company_id)
                                        ->where('client_id', '=', $item->client_id)
                                        ->where('employee_number', '=', $item->employee_number)
                                        ->first();

            $employee->token = $randomToken;
            $employee->save();

            $noticeTemp = TCounselingReserveNotice::where('user_company_id', '=', $item->user_company_id)
                                            ->where('client_id', '=', $item->client_id)
                                            ->where('employee_id', '=', $item->employee_number)
                                            ->where('target_month', '=', $now->year . '-' .$now->month . '-1')
                                            ->first();
            if (!$noticeTemp) {
                $notice = new TCounselingReserveNotice();
                $notice->user_company_id = $item->user_company_id;
                $notice->client_id = $item->client_id;
                $notice->employee_id = $item->employee_number;
                $notice->target_month = $now->year . '-' .$now->month . '-1';
                $notice->notice_date = $now->format('Y-m-d');
                $notice->regist_id = $item->client_id;
                $notice->update_id = $item->client_id;
                $notice->save();

                $url = sprintf('%s/survey/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $notice->id);
                $url2 = sprintf('%s/auth/forward-to-email-survey/?token=%s&id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $randomToken, $notice->id);

                $content = "【面接おまかせくん】
{$item->name}様
時間外・休日労働時間が閾値を超えました。面接指導実施医師の面接を受けてください。

以下URLより2種類のチェックの送信と、面接スケジュールを登録してください。
{$url}

PCへ転送を希望する方は下記URLへ転送先のメールアドレスを入力してください。
{$url2}

日本産業医支援機構
TEL：03-5615-8290
問合せ時間　平日9：00～17：00";

                (new Controller())->sendSMS($item->sms_number, $content);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    // 0-3 cols
    public function rules(): array
    {
        return [
            '0' => ['required',
                function($attribute, $value, $onFailure) {
                    $check = MClientEmployee::where('client_id', $this->clientId)
                                            ->where('user_company_id', $this->userCompanyId)
                                            ->where('employee_number', $value)
                                            ->first();
                    if (!$check) {
                        $onFailure(__('text.invalid_employee', ['attribute' => '社員番号']));
                    }
                }
            ],
            '2' => 'required|integer',
            '3' => 'required|integer'
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
            '2' => '前月残業時間', // overtime_bef_month
            '3' => '当月残業時間', // overtime
        ];
    }
}
