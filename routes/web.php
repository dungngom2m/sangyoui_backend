<?php

use App\Http\Controllers\Controller;
use App\Mail\NoticeChangeScheduleEmail;
use App\Mail\NoticeEmail24hSangyoi;
use App\Mail\NoticeEmail48hSangyoi;
use App\Mail\NoticeReportEmailSangyoi;
use App\Mail\NoticeReportEmailUser;
use App\Mail\NoticeReportEmailUser2;
use App\Mail\NoticeUpdateEmployee;
use App\Models\MClient;
use App\Models\MClientEmployee;
use App\Models\MClientUser;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TSangyoiSchedule;
use App\Models\TWorkingTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return env('APP_URL') ?: $_SERVER['APP_URL'];
});

Route::get('client/get-employee/{id}', function ($id) {
    $employee = MClient::join('m_client_employee', function ($join) {
        $join->on('m_client_employee.user_company_id', '=', 'm_client.user_company_id');
        $join->on('m_client_employee.client_id', '=', 'm_client.id');
        $join->whereNull('m_client_employee.deleted_at');
    })
        ->where('m_client.id', $id)
        ->select('m_client_employee.employee_number')
        ->get();

    return $employee;
});

Route::get('/test-config-server', function () {
    return view('test-config-server');
});

Route::get('/test-sms/{phone}', function ($phone) {
    $sns = new \Aws\Sns\SnsClient([
        'version' => 'latest',
        'region' => 'ap-northeast-1',
        'credentials' => array(
            'key' => 'AKIAYEQAEPEO6UUYTJ3K',
            'secret' => '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'
        )
    ]);

    $args = array(
        'Message' => 'test', // REQUIRED
        "MessageAttributes" => [
            'AWS.SNS.SMS.SMSType' => [
                'DataType' => 'String',
                'StringValue' => 'Promotional'
            ]
        ],
        'PhoneNumber' => $phone,
        'Subject' => '1212',
    );

    $result = $sns->publish($args);

    dd($result);
});

Route::get('/test-sms-booking', function () {
    $now = Carbon::now();

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
            ->where('target_month', '=', $now->year . '-' . $now->month . '-1')
            ->first();
        if (!$noticeTemp) {
            $notice = new TCounselingReserveNotice();
            $notice->user_company_id = $item->user_company_id;
            $notice->client_id = $item->client_id;
            $notice->employee_id = $item->employee_number;
            $notice->target_month = $now->year . '-' . $now->month . '-1';
            $notice->notice_date = $now->format('Y-m-d');
            $notice->regist_id = $item->client_id;
            $notice->update_id = $item->client_id;
            $notice->save();

            $url = sprintf('%s/survey/?id=%s', env('FRONT_URL'), $notice->id);
            $url2 = sprintf('%s/auth/forward-to-email-survey/?token=%s&id=%s', env('FRONT_URL'), $randomToken, $notice->id);

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

    return true;
});


Route::get('/test-notice', function () {
    $resource = TCounselingReserve::join('t_counseling_reserve_notice', function ($join) {
        $join->on('t_counseling_reserve_notice.id', '=', 't_counseling_reserve.reserve_issue_id');
        $join->whereNull('t_counseling_reserve_notice.deleted_at');
    })
        ->join('t_sangyoi_schedule', function ($join) {
            $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
            $join->whereNull('t_sangyoi_schedule.deleted_at');
        })
        ->join('m_sangyoi', function ($join) {
            $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
            $join->whereNull('m_sangyoi.deleted_at');
        })
        ->join('m_client_employee', function ($join) {
            $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
            $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
            $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
            $join->whereNull('m_client_employee.deleted_at');
        })
        ->join('m_client', function ($join) {
            $join->on('m_client.id', '=', 'm_client_employee.client_id');
            $join->whereNull('m_client.deleted_at');
        })
        ->join('m_user_company', function ($join) {
            $join->on('m_user_company.id', '=', 'm_client.user_company_id');
            $join->whereNull('m_user_company.deleted_at');
        })
        ->select(
            't_counseling_reserve.reserve_date as reserve_date',
            't_counseling_reserve.reserve_time_from as reserve_time_from',
            'm_client_employee.sms_number as sms_number',
            'm_client_employee.id as employee_id',
            't_counseling_reserve_notice.id as notice_id',
            't_counseling_reserve.zoom_meeting_id as zoom_meeting_id',
            't_counseling_reserve.zoom_meeting_pw as zoom_meeting_pw',
            't_counseling_reserve.zoom_meeting_url as zoom_meeting_url',
            't_counseling_reserve.id as reserve_id',
            'm_sangyoi.name as name',
            'm_sangyoi.contact_mailaddr as contact_mailaddr',
            'm_user_company.user_company_name as user_company_name',
            'm_client.manager_mailaddr_1 as manager_mailaddr_1',
            'm_client.manager_mailaddr_2 as manager_mailaddr_2',
            'm_client.manager_mailaddr_3 as manager_mailaddr_3',
            'm_client.manager_mailaddr_4 as manager_mailaddr_4',
            'm_client.manager_mailaddr_5 as manager_mailaddr_5',
            'm_client.manager_name_1 as manager_name_1',
            'm_client.manager_name_2 as manager_name_2',
            'm_client.manager_name_3 as manager_name_3',
            'm_client.manager_name_4 as manager_name_4',
            'm_client.manager_name_5 as manager_name_5',
            'm_client.id as client_id',
            'm_client.user_company_id as user_company_id',
            't_counseling_reserve.reserve_status as reserve_status',
        )
        ->get();

    (new Controller())->notice24h($resource);
    (new Controller())->notice48h($resource);

    $clientResource = $resource->groupBy('client_id')->map(function ($client) {
        return $client->first();
    });

    $nowReport = Carbon::now()->subDays(7);
    $resource2 = TCounselingReserve::join('t_counseling_reserve_notice', function ($join) {
        $join->on('t_counseling_reserve_notice.id', '=', 't_counseling_reserve.reserve_issue_id');
        $join->whereNull('t_counseling_reserve_notice.deleted_at');
    })
        ->join('m_client_employee', function ($join) {
            $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
            $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
            $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
            $join->whereNull('m_client_employee.deleted_at');
        })
        ->join('t_sangyoi_schedule', function ($join) {
            $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
            $join->whereNull('t_sangyoi_schedule.deleted_at');
        })
        ->join('m_sangyoi', function ($join) {
            $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
            $join->whereNull('m_sangyoi.deleted_at');
        })
        ->join('m_user', function ($join) {
            $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
            $join->whereNull('m_user.deleted_at');
        })
        ->select(
            't_counseling_reserve.reserve_date as reserve_date',
            't_counseling_reserve.reserve_time_from as reserve_time_from',
            't_counseling_reserve.reserve_time_to as reserve_time_to',
            'm_client_employee.name as emp_name',
            'm_sangyoi.name as doctor_name',
            'm_sangyoi.contact_mailaddr as doctor_mailaddr',
            't_counseling_reserve_notice.implementation_status as implementation_status',
            'm_user.mailaddr as user_mailaddr',
            't_counseling_reserve.id as reserve_id',
            't_counseling_reserve_notice.id as notice_id'
        )
        ->whereDate('t_counseling_reserve.reserve_date', '<', $nowReport)
        ->where('t_counseling_reserve_notice.implementation_status', '=', 2)
        ->get();

    (new Controller())->noticeUpdateEmployee($clientResource, $resource2);
    (new Controller())->noticeReportUser($resource2);

    $resource3 = TSangyoiSchedule::join('m_sangyoi', function ($join) {
        $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
        $join->whereNull('m_sangyoi.deleted_at');
    })
        ->join('m_user', function ($join) {
            $join->on('m_user.user_company_id', '=', 'm_sangyoi.user_company_id');
            $join->whereNull('m_user.deleted_at');
        })
        ->select(
            't_sangyoi_schedule.updated_at as updated_at',
            'm_sangyoi.name as doctor_name',
            'm_user.mailaddr as user_mailaddr',
            'm_sangyoi.shozoku as user_company_name',
            't_sangyoi_schedule.id as schedule_id',
        )
        ->get();

    (new Controller())->noticeChangeSchedule($resource3);

    return true;
});

// Route::get('/test-zoom', function () {
//     return (new Controller())->createZoomMeeting();
// });
