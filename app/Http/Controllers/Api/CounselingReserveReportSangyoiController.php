<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounselingReserveReportSangyoiCollection;
use App\Http\Resources\CounselingReserveSangyoiCollection;
use App\Http\Resources\SangyoiPaymentDetailPdf2Collection;
use App\Http\Resources\SangyoiPaymentDetailPdfResource;
use App\Models\MGensenZeiritsu;
use App\Models\MSangyoi;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CounselingReserveReportSangyoiController extends Controller
{
    /**
     * Create a new CounselingReserveReportSangyoiController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Counseling reserve list of report sangyoi.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $account = auth()->guard('sangyoi')->user();

            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'id':
                    $orderSortBy = 't_counseling_reserve.id';
                    break;
                case 'clientName':
                    $orderSortBy = 'm_client.client_name';
                    break;
                case 'employeeName':
                    $orderSortBy = 'm_client_employee.name';
                    break;
                case 'reserveDate':
                    $orderSortBy = 't_counseling_reserve.reserve_date';
                    break;
                case 'updatedAt':
                    $orderSortBy = 't_report_hospital.updated_at';
                    break;
                case 'counselingType':
                    $orderSortBy = 't_counseling_reserve.counseling_type';
                    break;
                case 'price':
                    $orderSortBy = 't_counseling_reserve.price';
                    break;
                default:
                    $orderSortBy = 't_counseling_reserve.id';
            }

            $count = TCounselingReserve::join('t_report_hospital', function ($join) {
                                            $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                            $join->whereNull('t_report_hospital.deleted_at');
                                        })
                                        ->join('t_sangyoi_schedule', function ($join) {
                                            $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                            $join->whereNull('t_sangyoi_schedule.deleted_at');
                                        })
                                        ->where('t_report_hospital.report_status', 1)
                                        ->where('t_sangyoi_schedule.doctor_id', $account->id)
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
                                            DB::raw("COUNT(t_report_hospital.id) as count"),
                                            DB::raw("SUM(t_counseling_reserve.price) as price")
                                        )
                                        ->first();

            $list = TCounselingReserve::join('t_counseling_reserve_notice', function ($join) {
                                        $join->on('t_counseling_reserve_notice.id', '=', 't_counseling_reserve.reserve_issue_id');
                                        $join->whereNull('t_counseling_reserve_notice.deleted_at');
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
                                        $join->on('m_client.id', '=', 'm_client_employee.client_id');
                                        $join->whereNull('m_client.deleted_at');
                                    })
                                    ->join('t_report_hospital', function ($join) {
                                        $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve.reserve_issue_id');
                                        $join->whereNull('t_report_hospital.deleted_at');
                                    })
                                    ->where('t_report_hospital.report_status', 1)
                                    ->where('t_sangyoi_schedule.doctor_id', $account->id)
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
                                    ->orderBy($orderSortBy, $request->orderBy)
                                    ->select(
                                        't_counseling_reserve.id as id',
                                        'm_client.client_name as client_name',
                                        'm_client_employee.name as employee_name',
                                        't_counseling_reserve.reserve_date as reserve_date',
                                        't_report_hospital.updated_at as updated_at',
                                        't_counseling_reserve.counseling_type as counseling_type',
                                        't_counseling_reserve.price as price',
                                        't_report_hospital.report_status as report_status'
                                    )
                                    ->get();

            return $this->response(200, [
                'count' => $count,
                'counselingReserve' => new CounselingReserveReportSangyoiCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Counseling reserve report list (pdf).
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function scanPdf(Request $request) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $now = Carbon::create($request->reserveDate);
            $nextMonth = $now->copy()->addMonth();

            $account = auth()->guard('sangyoi')->user();

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
                                ->where('m_sangyoi.id', $account->id)
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
                        ->where('t_sangyoi_schedule.doctor_id', $account->id)
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

            $sum4 = $sangyoiDetail->keiyaku_kbn != 2 ? 0 : ($clientsResult['sum1Temp'] * ($zeiRitsu/100));
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
}
