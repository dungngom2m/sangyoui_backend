<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Models\MClientEmployee;
use App\Models\TCounselingReserveNotice;
use App\Models\TWorkingTime;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SmsSchedule
{
    public function handle($request, Closure $next)
    {
        $now = Carbon::now();

        if ($now->hour == 9 && $now->minute == 0) {
            $query = TWorkingTime::join('m_client_employee', function ($join) {
                            $join->on('m_client_employee.user_company_id', '=', 't_working_time.user_company_code');
                            $join->on('m_client_employee.client_id', '=', 't_working_time.client_id');
                            $join->on('m_client_employee.employee_number', '=', 't_working_time.employee_number');
                            $join->whereNull('m_client_employee.deleted_at');
                        })
                        ->join('m_client', function ($join) {
                            $join->on('m_client.id', '=', 't_working_time.client_id');
                            $join->whereNull('m_client.deleted_at');
                        })
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
                        ->get();

            foreach ($query as $item) {
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

◆病院用

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

        return $next($request);
    }
}
