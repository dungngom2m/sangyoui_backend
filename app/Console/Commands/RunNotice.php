<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Models\TCounselingReserve;
use App\Models\TSangyoiSchedule;

class RunNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate notice';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
    }
}
