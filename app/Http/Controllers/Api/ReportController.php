<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportCollection;
use App\Http\Resources\ReportHospitalDetailInfosCollection;
use App\Http\Resources\ReportHospitalDetailResource;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TQuestionAnswer;
use App\Models\TReportGeneral;
use App\Models\TReportHospital;
use App\Models\TWorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    private $account;
    /**
     * Create a new ReportController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('clientUser')->user();
    }

    /**
     * Display a listing of report.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $firstDate = Carbon::create($request->year . '-' . $request->month);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->year . '-' . $request->month . '-' . $endDay);

            $sumWorkingTime = TWorkingTime::where('overtime', '>', 80)
                                            ->where('year', $request->year)
                                            ->where('month', $request->month)
                                            ->get();
            $sumAnswer = TQuestionAnswer::get();
            $sumReserve = TCounselingReserve::whereBetween('reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])->get();
            $sumReserveComplete = TCounselingReserve::where('reserve_status', '!=', 2)
                                                    ->whereBetween('reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                                    ->get();
            $sumReportHospital = TReportHospital::where('report_status', 1)
                                                ->whereBetween('updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                                ->get();
            // $sumReportGeneral = TReportGeneral::where('report_status', 1)->get();
            $sumReportGeneral = [];

            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'id':
                    $orderSortBy = 't_report_hospital.id';
                    break;
                case 'name':
                    $orderSortBy = 'm_sangyoi.name';
                    break;
                case 'overtime':
                    $orderSortBy = 't_working_time.overtime';
                    break;
                case 'registDate':
                    $orderSortBy = 't_counseling_reserve_notice.created_at';
                    break;
                case 'updateDate':
                    $orderSortBy = 't_kihoninf_hospital.updated_at';
                    break;
                case 'reserveDate':
                    $orderSortBy = 't_counseling_reserve.reserve_date';
                    break;
                case 'reportUpdateDate':
                    $orderSortBy = 't_report_hospital.updated_at';
                    break;
                default:
                    $orderSortBy = 't_report_hospital.id';
            }

            $listReportHospital = TReportHospital::join('t_counseling_reserve_notice', function ($join) {
                                                    $join->on('t_counseling_reserve_notice.id', '=', 't_report_hospital.reserve_issue_id');
                                                    $join->whereNull('t_counseling_reserve_notice.deleted_at');
                                                })
                                                ->join('t_counseling_reserve', function ($join) {
                                                    $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_report_hospital.reserve_issue_id');
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
                                                ->join('m_client_user', function ($join) {
                                                    $join->on('m_client_user.user_company_id', '=', 'm_sangyoi.user_company_id');
                                                    $join->whereNull('m_client_user.deleted_at');
                                                })
                                                ->where('m_client_user.id', $this->account->id)
                                                ->join('t_working_time', function ($join) {
                                                    $join->on('t_working_time.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                    $join->on('t_working_time.user_company_code', '=', 't_counseling_reserve_notice.user_company_id');
                                                    $join->on('t_working_time.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                    $join->whereNull('t_working_time.deleted_at');
                                                })
                                                ->join('t_kihoninf_hospital', function ($join) {
                                                    $join->on('t_kihoninf_hospital.reserve_issue_id', '=', 't_report_hospital.reserve_issue_id');
                                                    $join->whereNull('t_kihoninf_hospital.deleted_at');
                                                })
                                                ->where('overtime', '>', 80)
                                                ->where('t_counseling_reserve.reserve_status', '!=', 2)
                                                ->where(function($query) use ($firstDate, $endDate) {
                                                    $query->whereBetween('t_counseling_reserve_notice.created_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                                        ->orWhereBetween('t_kihoninf_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                                        ->orWhereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                                        ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                                })
                                                ->select(
                                                    't_report_hospital.id as id',
                                                    'm_sangyoi.name as name',
                                                    't_working_time.overtime as overtime',
                                                    't_counseling_reserve_notice.created_at as registDate',
                                                    't_kihoninf_hospital.updated_at as updateDate',
                                                    't_counseling_reserve.reserve_date as reserveDate',
                                                    't_report_hospital.updated_at as reportUpdateDate',
                                                    't_report_hospital.open_flg as openFlg',
                                                    't_counseling_reserve_notice.implementation_status as implementationStatus'
                                                )
                                                ->orderBy($orderSortBy, $request->orderBy)
                                                ->get();

            // $listReportGeneral = TReportGeneral::join('t_counseling_reserve_notice', function ($join) {
            //                                         $join->on('t_counseling_reserve_notice.id', '=', 't_report_general.reserve_issue_id');
            //                                         $join->whereNull('t_counseling_reserve_notice.deleted_at');
            //                                     })
            //                                     ->join('t_counseling_reserve', function ($join) {
            //                                         $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_report_general.reserve_issue_id');
            //                                         $join->whereNull('t_counseling_reserve.deleted_at');
            //                                     })
            //                                     ->join('t_sangyoi_schedule', function ($join) {
            //                                         $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
            //                                         $join->whereNull('t_sangyoi_schedule.deleted_at');
            //                                     })
            //                                     ->join('m_sangyoi', function ($join) {
            //                                         $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
            //                                         $join->whereNull('m_sangyoi.deleted_at');
            //                                     })
            //                                     ->join('t_working_time', function ($join) {
            //                                         $join->on('t_working_time.client_id', '=', 't_counseling_reserve_notice.client_id');
            //                                         $join->on('t_working_time.user_company_code', '=', 't_counseling_reserve_notice.user_company_id');
            //                                         $join->on('t_working_time.employee_number', '=', 't_counseling_reserve_notice.employee_id');
            //                                         $join->whereNull('t_working_time.deleted_at');
            //                                     })
            //                                     ->join('t_kihoninf_general', function ($join) {
            //                                         $join->on('t_kihoninf_general.reserve_issue_id', '=', 't_report_general.reserve_issue_id');
            //                                         $join->whereNull('t_kihoninf_general.deleted_at');
            //                                     })
            //                                     ->select(
            //                                         't_report_general.id as id',
            //                                         'm_sangyoi.name as name',
            //                                         't_working_time.overtime as overtime',
            //                                         't_counseling_reserve_notice.created_at as registDate',
            //                                         't_kihoninf_general.updated_at as updateDate',
            //                                         't_counseling_reserve.reserve_date as reserveDate',
            //                                         't_report_general.updated_at as reportUpdateDate',
            //                                         't_report_general.open_flg as openFlg',
            //                                     )
            //                                     ->distinct()
            //                                     ->get();

            return $this->response(200, [
                'sumWorkingTime' => count($sumWorkingTime),
                'sumAnswer' => count($sumAnswer),
                'sumReserve' => count($sumReserve),
                'sumReserveComplete' => count($sumReserveComplete),
                'sumReport' => count($sumReportHospital) + count($sumReportGeneral),
                'listReport' => new ReportCollection($listReportHospital)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Detail report.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            $detail = TReportHospital::join('t_counseling_reserve_notice', function ($join) {
                                        $join->on('t_counseling_reserve_notice.id', '=', 't_report_hospital.reserve_issue_id');
                                        $join->whereNull('t_counseling_reserve_notice.deleted_at');
                                    })
                                    ->join('t_kihoninf_hospital', function ($join) {
                                        $join->on('t_kihoninf_hospital.reserve_issue_id', '=', 't_report_hospital.reserve_issue_id');
                                        $join->whereNull('t_kihoninf_hospital.deleted_at');
                                    })
                                    ->join('t_counseling_reserve', function ($join) {
                                        $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_report_hospital.reserve_issue_id');
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
                                    ->where('t_report_hospital.id', $id)
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
                                        't_report_hospital.sangyoi_iken as sangyoi_iken',
                                        't_report_hospital.iken_update_date as iken_update_date',
                                        't_report_hospital.iken_update_person_name as iken_update_person_name',
                                        't_report_hospital.sochi_naiyo as sochi_naiyo',
                                        't_report_hospital.sochi_update_date as sochi_update_date',
                                        't_report_hospital.iryokikan_name as iryokikan_name',
                                        't_report_hospital.kanrisha_name as kanrisha_name',
                                        't_report_hospital.jigyosha_name as jigyosha_name',
                                        't_report_hospital.open_flg as open_flg'
                                    )
                                    ->first();

        $updateInfos = TReportHospital::leftJoin('m_client_user', function ($join) {
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
                                        't_report_hospital.id as id',
                                    )
                                    ->orderBy('updated_at', 'desc')
                                    ->get();

            return $this->response(200, [
                'report' => new ReportHospitalDetailResource($detail),
                'updateInfos' => new ReportHospitalDetailInfosCollection($updateInfos)
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Update report.
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
                'sangyoiIken' => ['max:1000'],
                'sochiNaiyo' => ['max:1000'],
                'iryokikanName' => ['max:100'],
                'kanrishaName' => ['max:100'],
                'jigyoshaName' => ['max:100'],
                'ikenUpdateDate' => ['nullable', 'date_format:Y/m/d'],
                'ikenUpdatePersonName' => ['max:100'],
                'sochiUpdateDate' => ['nullable', 'date_format:Y/m/d'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'suiminSituation' => '睡眠負債状況',
                'suiminSituationMemo' => '睡眠負債特記事項',
                'hirouSituation' => '疲労蓄積状態',
                'hirouSituationMemo' => '疲労蓄積特記事項',
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
                'sangyoiIken' => '産業医意見',
                'sochiNaiyo' => '措置内容',
                'iryokikanName' => '医療機関名',
                'kanrishaName' => '管理者名',
                'jigyoshaName' => '事業者名',
                'ikenUpdateDate' => '意見記入日',
                'ikenUpdatePersonName' => '意見記入産業医',
                'sochiUpdateDate' => '措置内容記入日',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            DB::beginTransaction();
            $account = auth()->guard('clientUser')->user();

            $report = TReportHospital::find($id);
            $report->suimin_situation = $request->suiminSituation;
            $report->suimin_situation_memo = $request->suiminSituationMemo;
            $report->hirou_situation = $request->hirouSituation;
            $report->hirou_situation_memo = $request->hirouSituationMemo;
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
            $report->sangyoi_iken = $request->sangyoiIken;
            $report->sochi_naiyo = $request->sochiNaiyo;
            $report->iryokikan_name = $request->iryokikanName;
            $report->kanrisha_name = $request->kanrishaName;
            $report->jigyosha_name = $request->jigyoshaName;
            $report->iken_update_date = $request->ikenUpdateDate;
            $report->iken_update_person_name = $request->ikenUpdatePersonName;
            $report->sochi_update_date = $request->sochiUpdateDate;
            $report->report_status = 1;
            $report->update_id = $account->id;
            $report->save();

            $notice = TCounselingReserveNotice::find($report->reserve_issue_id);
            $notice->implementation_status = 5;
            $notice->save();

            DB::commit();
            return $this->response(200, [
                'result' => $report ? true : false
            ], __('text.update_succeed', ['attribute' => '病院向け面談指導結果']));
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => '病院向け面談指導結果']));
        }
    }
}
