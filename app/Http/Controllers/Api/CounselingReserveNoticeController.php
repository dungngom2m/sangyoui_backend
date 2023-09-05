<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounselingReserveNoticeCollection;
use App\Http\Resources\CounselingReserveNoticeHospitalDetailResource;
use App\Http\Resources\CounselingReserveSangyoiDetailResource;
use App\Http\Resources\QuestionAnswerCollection;
use App\Http\Resources\ReportHospitalDetailInfosCollection;
use App\Http\Resources\ReportHospitalDetailInfosResource;
use App\Mail\NoticeUpdateMail;
use App\Models\MClientUser;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TQuestionAnswer;
use App\Models\TReportHospital;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CounselingReserveNoticeController extends Controller
{
    private $account;
    /**
     * Create a new CounselingReserveNoticeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('user')->user();
    }

    /**
     * Counseling reserve notice list.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
        try {
            $status = '';
            foreach(parent::implementationStatus as $item) {
                if (!empty($request->keyword) && str_contains($item['label'], $request->keyword)) {
                    $status = $item['id'];
                    break;
                }
            }

            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'id':
                    $orderSortBy = 't_counseling_reserve_notice.id';
                    break;
                case 'reserveId':
                    $orderSortBy = 't_counseling_reserve.id';
                    break;
                case 'name':
                    $orderSortBy = 'm_client_employee.name';
                    break;
                case 'clientName':
                    $orderSortBy = 'm_client.client_name';
                    break;
                case 'sangyoiName':
                    $orderSortBy = 'm_sangyoi.name';
                    break;
                case 'implementationStatus':
                    $orderSortBy = 't_counseling_reserve_notice.implementation_status';
                    break;
                case 'hosUpdateDate':
                    $orderSortBy = 't_report_hospital.updated_at';
                    break;
                default:
                    $orderSortBy = 't_counseling_reserve_notice.id';
            }

            $list = TCounselingReserveNotice::join('t_counseling_reserve', function ($join) {
                                                $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                $join->whereNull('t_counseling_reserve.deleted_at');
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
                                            ->join('t_sangyoi_schedule', function ($join) {
                                                $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                                $join->whereNull('t_sangyoi_schedule.deleted_at');
                                            })
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
                                            ->leftJoin('t_report_hospital', function ($join) {
                                                $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                $join->whereNull('t_report_hospital.deleted_at');
                                            })
                                            // ->leftJoin('t_report_general', function ($join) {
                                            //     $join->on('t_report_general.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                            //     $join->whereNull('t_report_general.deleted_at');
                                            // })
                                            ->where('m_user.id', $this->account->id)
                                            ->where(function($query) use ($request) {
                                                $query->where('t_counseling_reserve.id', 'LIKE', '%'.$request->keyword.'%')
                                                    ->orWhere('m_client_employee.name', 'LIKE', '%'.$request->keyword.'%')
                                                    ->orWhere('m_sangyoi.name', 'LIKE', '%'.$request->keyword.'%');
                                            })
                                            ->when($status != '', function ($query) use ($status) {
                                                return $query->orWhere('t_counseling_reserve_notice.implementation_status', '=', $status);
                                            })
                                            ->where('t_counseling_reserve.reserve_status', '!=', 2)
                                            ->select(
                                                't_counseling_reserve_notice.id as id',
                                                't_counseling_reserve.id as reserve_id',
                                                'm_client_employee.name as name',
                                                'm_client.client_name as client_name',
                                                'm_sangyoi.name as sangyoi_name',
                                                't_counseling_reserve_notice.implementation_status as implementation_status',
                                                't_report_hospital.updated_at as hos_update_date',
                                                // 't_report_general.updated_at as gen_update_date'
                                            )
                                            ->orderBy($orderSortBy, $request->orderBy)
                                            ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'notices' => new CounselingReserveNoticeCollection($list),
                'statusOption' => parent::implementationStatus
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Detail counseling reserve notice.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            $detail = TCounselingReserveNotice::leftJoin('t_report_hospital', function ($join) {
                                                $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                $join->whereNull('t_report_hospital.deleted_at');
                                            })
                                            ->join('t_kihoninf_hospital', function ($join) {
                                                $join->on('t_kihoninf_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                $join->whereNull('t_kihoninf_hospital.deleted_at');
                                            })
                                            ->join('m_client_employee', function ($join) {
                                                $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                $join->whereNull('m_client_employee.deleted_at');
                                            })
                                            ->join('t_counseling_reserve', function ($join) {
                                                $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                $join->whereNull('t_counseling_reserve.deleted_at');
                                            })
                                            ->join('t_sangyoi_schedule', function ($join) {
                                                $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                                $join->whereNull('t_sangyoi_schedule.deleted_at');
                                            })
                                            ->join('m_sangyoi', function ($join) {
                                                $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                                $join->whereNull('m_sangyoi.deleted_at');
                                            })
                                            ->where('t_counseling_reserve_notice.id', $id)
                                            ->select(
                                                't_report_hospital.created_at as created_at',
                                                't_report_hospital.updated_at as updated_at',
                                                't_report_hospital.update_id as update_id',
                                                't_kihoninf_hospital.name_kana as name_kana',
                                                't_kihoninf_hospital.name as name',
                                                't_kihoninf_hospital.department as department',
                                                't_kihoninf_hospital.birthday_year as birthday_year',
                                                't_kihoninf_hospital.birthday_month as birthday_month',
                                                't_kihoninf_hospital.birthday_day as birthday_day',
                                                't_report_hospital.work_situation as work_situation',
                                                't_report_hospital.suimin_situation as suimin_situation',
                                                't_report_hospital.suimin_situation_memo as suimin_situation_memo',
                                                't_report_hospital.hirou_situation as hirou_situation',
                                                't_report_hospital.hirou_situation_memo as hirou_situation_memo',
                                                't_report_hospital.other_memo as other_memo',
                                                't_report_hospital.syugyo_taisyo_fuyo_flg as syugyo_taisyo_fuyo_flg',
                                                't_report_hospital.shinshin_keizoku_flg as shinshin_keizoku_flg',
                                                't_report_hospital.shinshin_keizoku_memo as shinshin_keizoku_memo',
                                                't_report_hospital.shinshin_jushin_flg as shinshin_jushin_flg',
                                                't_report_hospital.shinshin_jushin_memo as shinshin_jushin_memo',
                                                't_report_hospital.shinshin_renkei_flg as shinshin_renkei_flg',
                                                't_report_hospital.shinshin_renkei_memo as shinshin_renkei_memo',
                                                't_report_hospital.shinshin_other_flg as shinshin_other_flg',
                                                't_report_hospital.shinshin_other_memo as shinshin_other_memo',
                                                't_report_hospital.kinmujokyo_1_flg as kinmujokyo_1_flg',
                                                't_report_hospital.kinmujokyo_2_flg as kinmujokyo_2_flg',
                                                't_report_hospital.kinmujokyo_other_flg as kinmujokyo_other_flg',
                                                't_report_hospital.kinmujokyo_other_memo as kinmujokyo_other_memo',
                                                't_report_hospital.tokki_memo as tokki_memo',
                                                't_counseling_reserve.reserve_date as reserve_date',
                                                't_report_hospital.mensetsu_ishi_shozoku as mensetsu_ishi_shozoku',
                                                'm_sangyoi.name as sangyoi_name',
                                                'm_client_employee.id as emp_id',
                                                't_counseling_reserve_notice.implementation_status as implementation_status',
                                            )
                                            ->first();

            $updateInfos = TCounselingReserveNotice::join('t_report_hospital', function ($join) {
                                                $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                $join->whereNull('t_report_hospital.deleted_at');
                                            })
                                            ->leftJoin('m_client_user', function ($join) {
                                                $join->on(DB::raw("m_client_user.id::VARCHAR"), "=", DB::raw("t_report_hospital.update_id"));
                                                $join->whereNull('m_client_user.deleted_at');
                                            })
                                            ->leftJoin('m_user', function ($join) {
                                                $join->on(DB::raw("m_user.id::VARCHAR"), "=", DB::raw("t_report_hospital.update_id"));
                                                $join->whereNull('m_user.deleted_at');
                                            })
                                            ->leftJoin('m_sangyoi', function ($join) {
                                                $join->on(DB::raw("m_sangyoi.id::VARCHAR"), "=", DB::raw("t_report_hospital.update_id"));
                                                $join->whereNull('m_sangyoi.deleted_at');
                                            })
                                            ->select(
                                                'm_client_user.name as cli_name',
                                                'm_user.name as user_name',
                                                'm_sangyoi.name as sangyoi_name',
                                                't_report_hospital.updated_at as updated_at',
                                                't_report_hospital.update_id as update_id',
                                                't_counseling_reserve_notice.id as id',
                                            )
                                            ->orderBy('updated_at', 'desc')
                                            ->get();

            $notice = TCounselingReserveNotice::where('id', $id)->first();

            $countReserveOfDoctor = TCounselingReserveNotice::join('m_user', function ($join) {
                                                $join->on('m_user.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                $join->whereNull('m_user.deleted_at');
                                            })
                                            ->where('m_user.id', $this->account->id)
                                            ->whereBetween('t_counseling_reserve_notice.implementation_status', [1, 5])
                                            ->where('t_counseling_reserve_notice.client_id', $notice->client_id)
                                            ->where('t_counseling_reserve_notice.user_company_id', $notice->user_company_id)
                                            ->where('t_counseling_reserve_notice.employee_id', $notice->employee_id)
                                            ->select(
                                                't_counseling_reserve_notice.client_id',
                                                't_counseling_reserve_notice.user_company_id',
                                                't_counseling_reserve_notice.employee_id',
                                            )
                                            // ->groupBy(
                                            //     't_counseling_reserve_notice.client_id',
                                            //     't_counseling_reserve_notice.user_company_id',
                                            //     't_counseling_reserve_notice.employee_id',
                                            // )
                                            ->get();

            $counselingReserve = TCounselingReserve::join('t_counseling_reserve_notice', function ($join) {
                                                        $join->on('t_counseling_reserve_notice.id', '=', 't_counseling_reserve.reserve_issue_id');
                                                        $join->whereNull('t_counseling_reserve_notice.deleted_at');
                                                    })
                                                    ->leftJoin('t_kihoninf_hospital', function ($join) {
                                                        $join->on('t_kihoninf_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                                        $join->whereNull('t_kihoninf_hospital.deleted_at');
                                                    })
                                                    ->leftJoin('t_question_answer', function ($join) {
                                                        $join->on('t_question_answer.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                                        $join->whereNull('t_question_answer.deleted_at');
                                                    })
                                                    ->join('m_client_employee', function ($join) {
                                                        $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                        $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                        $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                        $join->whereNull('m_client_employee.deleted_at');
                                                    })
                                                    ->join('t_working_time', function ($join) {
                                                        $join->on('t_working_time.client_id', '=', 'm_client_employee.client_id');
                                                        $join->on('t_working_time.user_company_code', '=', 'm_client_employee.user_company_id');
                                                        $join->on('t_working_time.employee_number', '=', 'm_client_employee.employee_number');
                                                        $join->whereNull('t_working_time.deleted_at');
                                                        $join->whereColumn('t_working_time.target_month', '=', 't_counseling_reserve_notice.target_month');
                                                    })
                                                    ->join('m_client', function ($join) {
                                                        $join->on('m_client.id', '=', 'm_client_employee.client_id');
                                                        $join->whereNull('m_client.deleted_at');
                                                    })
                                                    ->join('t_sangyoi_schedule', function ($join) {
                                                        $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                                        $join->whereNull('t_sangyoi_schedule.deleted_at');
                                                    })
                                                    ->join('m_sangyoi', function ($join) {
                                                        $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                                        $join->whereNull('m_sangyoi.deleted_at');
                                                    })
                                                    ->where('t_counseling_reserve_notice.id', $id)
                                                    ->select(
                                                        't_working_time.overtime as overtime',
                                                        'm_client.client_name as client_name',
                                                        'm_client_employee.name as emp_name',
                                                        'm_client_employee.name_kana as emp_name_kana',
                                                        't_counseling_reserve.reserve_date as reserve_date',
                                                        'm_sangyoi.name as sangyoi_name',
                                                        't_question_answer.created_at as ques_created_at',
                                                        't_counseling_reserve.zoom_meeting_id as zoom_meeting_id',
                                                        't_counseling_reserve.zoom_meeting_pw as zoom_meeting_pw',
                                                        't_counseling_reserve.zoom_meeting_url as zoom_meeting_url',
                                                        't_kihoninf_hospital.hospital_name as hospital_name',
                                                        't_kihoninf_hospital.department as department',
                                                        't_kihoninf_hospital.employee_no as employee_no',
                                                        't_kihoninf_hospital.name as kiho_name',
                                                        't_kihoninf_hospital.name_kana as kiho_name_kana',
                                                        't_kihoninf_hospital.birthday_year as birthday_year',
                                                        't_kihoninf_hospital.birthday_month as birthday_month',
                                                        't_kihoninf_hospital.birthday_day as birthday_day',
                                                        't_kihoninf_hospital.sex as sex',
                                                        't_kihoninf_hospital.jikangai_kbn_lastmonth as jikangai_kbn_lastmonth',
                                                        't_kihoninf_hospital.interval_low9_flg_lastmonth as interval_low9_flg_lastmonth',
                                                        't_kihoninf_hospital.interval_low18_flg_lastmonth as interval_low18_flg_lastmonth',
                                                        't_kihoninf_hospital.jikangai_kbn as jikangai_kbn',
                                                        't_kihoninf_hospital.interval_low9_flg as interval_low9_flg',
                                                        't_kihoninf_hospital.interval_low18_flg as interval_low18_flg',
                                                        't_kihoninf_hospital.busy_kbn as busy_kbn',
                                                        't_kihoninf_hospital.oncall_cnt as oncall_cnt',
                                                        't_kihoninf_hospital.tocyoku_cnt as tocyoku_cnt',
                                                        't_kihoninf_hospital.niccyoku_cnt as niccyoku_cnt',
                                                        't_kihoninf_hospital.tukin_hour as tukin_hour',
                                                        't_kihoninf_hospital.tukin_min as tukin_min',
                                                        't_kihoninf_hospital.tukin_kbn as tukin_kbn',
                                                        't_kihoninf_hospital.fukugyo_hour as fukugyo_hour',
                                                        't_kihoninf_hospital.fukugyo_tukin_hour as fukugyo_tukin_hour',
                                                        't_kihoninf_hospital.fukugyo_tukin_min as fukugyo_tukin_min',
                                                        't_kihoninf_hospital.suimin_hour_wd_kbn as suimin_hour_wd_kbn',
                                                        't_kihoninf_hospital.suimin_hour_hd_kbn as suimin_hour_hd_kbn',
                                                        't_kihoninf_hospital.kisyo_diff_hour_kbn as kisyo_diff_hour_kbn',
                                                        't_kihoninf_hospital.holiday_cnt_lastmonth as holiday_cnt_lastmonth',
                                                        't_kihoninf_hospital.holiday_cnt_fumei_flg as holiday_cnt_fumei_flg',
                                                        't_kihoninf_hospital.yukyu_kbn as yukyu_kbn',
                                                        't_kihoninf_hospital.doctor_fusoku_flg as doctor_fusoku_flg',
                                                        't_kihoninf_hospital.kodo_gyomu_flg as kodo_gyomu_flg',
                                                        't_kihoninf_hospital.study_none_flg as study_none_flg',
                                                        't_kihoninf_hospital.fukugyo_need_flg as fukugyo_need_flg',
                                                        't_kihoninf_hospital.doctor_com_flg as doctor_com_flg',
                                                        't_kihoninf_hospital.no_doctor_com_flg as no_doctor_com_flg',
                                                        't_kihoninf_hospital.other_flg_9 as other_flg_9',
                                                        't_kihoninf_hospital.other_memo_9 as other_memo_9',
                                                        't_kihoninf_hospital.ryoritsu_flg as ryoritsu_flg',
                                                        't_kihoninf_hospital.kyoyo_flg as kyoyo_flg',
                                                        't_kihoninf_hospital.koreisya_kaigo_flg as koreisya_kaigo_flg',
                                                        't_kihoninf_hospital.byonin_kaigo_flg as byonin_kaigo_flg',
                                                        't_kihoninf_hospital.tukin_long_flg as tukin_long_flg',
                                                        't_kihoninf_hospital.other_flg_10 as other_flg_10',
                                                        't_kihoninf_hospital.other_memo_10 as other_memo_10',
                                                        't_kihoninf_hospital.chiryo_kbn as chiryo_kbn',
                                                        't_kihoninf_hospital.chiryo_memo as chiryo_memo',
                                                        't_kihoninf_hospital.sochi_kbn as sochi_kbn',
                                                        't_kihoninf_hospital.insyu_kbn as insyu_kbn',
                                                        't_kihoninf_hospital.kitsuen_kbn as kitsuen_kbn',
                                                        't_kihoninf_hospital.tokki_none_flg as tokki_none_flg',
                                                        't_kihoninf_hospital.sleepy_flg as sleepy_flg',
                                                        't_kihoninf_hospital.fat_flg as fat_flg',
                                                        't_kihoninf_hospital.other_flg_12 as other_flg_12',
                                                        't_kihoninf_hospital.other_memo_12 as other_memo_12',
                                                        't_kihoninf_hospital.memo as memo',
                                                        't_counseling_reserve.reserve_issue_id as reserve_issue_id',
                                                        'm_client_employee.id as emp_id',
                                                    )
                                                    ->first();

            $counselingReserve->count_reserve_of_doctor = count($countReserveOfDoctor) ?? 0;

            $questionAnswers = TQuestionAnswer::where('reserve_issue_id', $id)
                                                ->where('question_lev1_no', 1)
                                                ->orWhere('question_lev1_no', 2)
                                                ->orderBy('question_lev1_no', 'asc')
                                                ->orderBy('question_lev2_no', 'asc')
                                                ->distinct('question_lev1_no', 'question_lev2_no')
                                                ->get();

            $selfChecklist = $this->calculateScoreAnswer($counselingReserve->reserve_issue_id);

            return $this->response(200, [
                'counselingReserve' => new CounselingReserveSangyoiDetailResource($counselingReserve),
                'questionAnswers' => new QuestionAnswerCollection($questionAnswers),
                'report' => new CounselingReserveNoticeHospitalDetailResource($detail),
                'updateInfos' => new ReportHospitalDetailInfosCollection($updateInfos),
                'selfChecklist' => $selfChecklist
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Update notice.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'suiminSituation' => ['required', 'integer'],
                'suiminSituationMemo' => ['max:1000'],
                'hirouSituation' => ['required', 'integer'],
                'hirouSituationMemo' => ['max:1000'],
                'otherMemo' => ['max:1000'],
                'syugyoTaisyoFuyoFlg' => ['required', 'string', 'max:1'],
                'shinshinKeizokuFlg' => ['required', 'string', 'max:1'],
                'shinshinKeizokuMemo' => ['max:1000'],
                'shinshinJushinFlg' => ['required', 'string', 'max:1'],
                'shinshinJushinMemo' => ['max:1000'],
                'shinshinRenkeiFlg' => ['required', 'string', 'max:1'],
                'shinshinRenkeiMemo' => ['max:1000'],
                'shinshinOtherFlg' => ['required', 'string', 'max:1'],
                'shinshinOtherMemo' => ['max:1000'],
                'kinmujokyo1Flg' => ['required', 'string', 'max:1'],
                'kinmujokyo2Flg' => ['required', 'string', 'max:1'],
                'kinmujokyoOtherFlg' => ['required', 'string', 'max:1'],
                'kinmujokyoOtherMemo' => ['max:1000'],
                'tokkiMemo' => ['max:1000'],
                'mensetsuIshiShozoku' => ['max:100'],
                'workSituation' => ['max:1000'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'suiminSituation' => '睡眠負債状況',
                'suiminSituationMemo' => '睡眠負債特記事項',
                'hirouSituation' => '疲労蓄積状態',
                'hirouSituationMemo' => '疲労蓄積特記事項',
                'otherMemo' => 'その他心身状況',
                'syugyoTaisyoFuyoFlg' => '就業上措置不要フラグ',
                'shinshinKeizokuFlg' => '心身状況治療継続フラグ',
                'shinshinKeizokuMemo' => '心身状況治療継続メモ',
                'shinshinJushinFlg' => '心身状況専門医受診フラグ',
                'shinshinJushinMemo' => '心身状況専門医受診メモ',
                'shinshinRenkeiFlg' => '心身状況専門医連携フラグ',
                'shinshinRenkeiMemo' => '心身状況専門医連携メモ',
                'shinshinOtherFlg' => '心身状況その他フラグ',
                'shinshinOtherMemo' => '心身状況その他メモ',
                'kinmujokyo1Flg' => '勤務状況1フラグ',
                'kinmujokyo2Flg' => '勤務状況2フラグ',
                'kinmujokyoOtherFlg' => '勤務状況その他フラグ',
                'kinmujokyoOtherMemo' => '勤務状況その他メモ',
                'tokkiMemo' => '指導内容特記事項',
                'mensetsuIshiShozoku' => '面接指導医師所属',
                'workSituation' => '勤務状況',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $account = auth()->guard('user')->user();

            $noticeQuery = TCounselingReserveNotice::join('m_client_employee', function ($join) {
                                                        $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                        $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                        $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                        $join->whereNull('m_client_employee.deleted_at');
                                                    })
                                                    ->join('t_counseling_reserve', function ($join) {
                                                        $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                                        $join->whereNull('t_counseling_reserve.deleted_at');
                                                    })
                                                    ->join('t_sangyoi_schedule', function ($join) {
                                                        $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                                        $join->whereNull('t_sangyoi_schedule.deleted_at');
                                                    })
                                                    ->join('m_sangyoi', function ($join) {
                                                        $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                                        $join->whereNull('m_sangyoi.deleted_at');
                                                    })
                                                    ->where('t_counseling_reserve_notice.id', $id)
                                                    ->select(
                                                        't_counseling_reserve_notice.client_id as clientId',
                                                        't_counseling_reserve_notice.user_company_id as userCompanyId',
                                                        'm_client_employee.name as employeeName',
                                                        'm_sangyoi.name as sangyoiName',
                                                        't_counseling_reserve.reserve_date as reserveDate',
                                                        't_counseling_reserve.reserve_time_from as reserveTimeFrom',
                                                    )
                                                    ->first();

            $reportQuery = TReportHospital::where('reserve_issue_id', $id)
                                            ->select(
                                                't_report_hospital.id as id',
                                            )
                                            ->first();

            if (isset($reportQuery->id)) {
                $report = TReportHospital::find($reportQuery->id);
                $report->suimin_situation = $request->suiminSituation;
                $report->suimin_situation_memo = $request->suiminSituationMemo;
                $report->hirou_situation = $request->hirouSituation;
                $report->hirou_situation_memo = $request->hirouSituationMemo;
                $report->other_memo = $request->otherMemo;
                $report->syugyo_taisyo_fuyo_flg = $request->syugyoTaisyoFuyoFlg;
                $report->shinshin_keizoku_flg = $request->shinshinKeizokuFlg;
                $report->shinshin_keizoku_memo = $request->shinshinKeizokuMemo;
                $report->shinshin_jushin_flg = $request->shinshinJushinFlg;
                $report->shinshin_jushin_memo = $request->shinshinJushinMemo;
                $report->shinshin_renkei_flg = $request->shinshinRenkeiFlg;
                $report->shinshin_renkei_memo = $request->shinshinRenkeiMemo;
                $report->shinshin_other_flg = $request->shinshinOtherFlg;
                $report->shinshin_other_memo = $request->shinshinOtherMemo;
                $report->kinmujokyo_1_flg = $request->kinmujokyo1Flg;
                $report->kinmujokyo_2_flg = $request->kinmujokyo2Flg;
                $report->kinmujokyo_other_flg = $request->kinmujokyoOtherFlg;
                $report->kinmujokyo_other_memo = $request->kinmujokyoOtherMemo;
                $report->tokki_memo = $request->tokkiMemo;
                $report->mensetsu_ishi_shozoku = $request->mensetsuIshiShozoku;
                $report->work_situation = $request->workSituation;
                $report->update_id = $account->id;
                $report->save();
            } else {
                $report = new TReportHospital();
                $report->reserve_issue_id = $id;
                $report->suimin_situation = $request->suiminSituation;
                $report->suimin_situation_memo = $request->suiminSituationMemo;
                $report->hirou_situation = $request->hirouSituation;
                $report->hirou_situation_memo = $request->hirouSituationMemo;
                $report->other_memo = $request->otherMemo;
                $report->syugyo_taisyo_fuyo_flg = $request->syugyoTaisyoFuyoFlg;
                $report->shinshin_keizoku_flg = $request->shinshinKeizokuFlg;
                $report->shinshin_keizoku_memo = $request->shinshinKeizokuMemo;
                $report->shinshin_jushin_flg = $request->shinshinJushinFlg;
                $report->shinshin_jushin_memo = $request->shinshinJushinMemo;
                $report->shinshin_renkei_flg = $request->shinshinRenkeiFlg;
                $report->shinshin_renkei_memo = $request->shinshinRenkeiMemo;
                $report->shinshin_other_flg = $request->shinshinOtherFlg;
                $report->shinshin_other_memo = $request->shinshinOtherMemo;
                $report->kinmujokyo_1_flg = $request->kinmujokyo1Flg;
                $report->kinmujokyo_2_flg = $request->kinmujokyo2Flg;
                $report->kinmujokyo_other_flg = $request->kinmujokyoOtherFlg;
                $report->kinmujokyo_other_memo = $request->kinmujokyoOtherMemo;
                $report->tokki_memo = $request->tokkiMemo;
                $report->mensetsu_ishi_shozoku = $request->mensetsuIshiShozoku;
                $report->work_situation = $request->workSituation;
                $report->regist_id = $account->id;
                $report->update_id = $account->id;
                $report->save();
            }

            $notice = TCounselingReserveNotice::find($id);
            $notice->implementation_status = 4;
            $notice->save();

            $clientUsers = MClientUser::where('user_company_id', $noticeQuery->userCompanyId)
                                    ->where('client_id', $noticeQuery->clientId)
                                    ->get();

            $dateParam = new Carbon($noticeQuery->reserveDate);
            $timeParam = new Carbon($noticeQuery->reserveTimeFrom);

            $url = sprintf('%s/cp/client/reports/hospital-detail/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $report->id);

            foreach($clientUsers as $clientUser) {
                Mail::to($clientUser->mailaddr)->send(new NoticeUpdateMail([
                    'url' => $url,
                    'clientUserName' => $clientUser->name,
                    'employeeName' => $noticeQuery->employeeName,
                    'sangyoiName' => $noticeQuery->sangyoiName,
                    'reserveDate' => $dateParam->format('Y-m-d') ?? '',
                    'reserveTimeFrom' => $timeParam->format('H:i') ?? '',
                    'reserveTimeTo' => $timeParam->copy()->addMinutes(30)->format('H:i'),
                    'tel' => env("ENV_TEL"),
                    'hour' => env("ENV_HOUR")
                ]));
            }

            return $this->response(200, [
                'result' => $report ? true : false
            ], __('text.update_succeed', ['attribute' => '病院向け面談指導結果']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => '病院向け面談指導結果']));
        }
    }

}
