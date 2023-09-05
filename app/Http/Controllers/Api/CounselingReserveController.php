<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CancelEmailSangyoi;
use App\Mail\CancelEmailUser;
use App\Mail\ChangeScheduleReservationCompleteEmail;
use App\Mail\LateEmailSangyoi;
use App\Mail\LateEmailUser;
use App\Mail\ReservationCompleteEmail;
use App\Mail\ReservationCompleteEmailClientUser;
use App\Models\MClient;
use App\Models\MClientUser;
use App\Models\MQuestionnaire;
use App\Models\MSangyoi;
use App\Models\MUser;
use App\Models\MUserCompany;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TKihoninfHospital;
use App\Models\TQuestionAnswer;
use App\Models\TReportHospital;
use App\Models\TSangyoiSchedule;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Jubaer\Zoom\Facades\Zoom;

class CounselingReserveController extends Controller
{
    /**
     * Create a new CounselingReserveController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of sangyoiSchedule.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $patient = auth()->guard('code')->user();

            // Check notice id
            // $employee = TCounselingReserveNotice::join('m_client_employee', function ($join) {
            //                                     $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
            //                                     $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
            //                                     $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
            //                                     $join->whereNull('m_client_employee.deleted_at');
            //                                 })
            //                                 ->where('t_counseling_reserve_notice.id', $request->noticeId)
            //                                 ->select('m_client_employee.id as id')
            //                                 ->first();

            // if(!isset($employee) || $patient->id != $employee->id) {
            //     return $this->response(422, [], __('text.invalid_notice'));
            // }

            // Check 2 doctor nearest
            $doctorQuery = TCounselingReserve::join('t_sangyoi_schedule', function ($join) {
                                            $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                            $join->whereNull('t_sangyoi_schedule.deleted_at');
                                        })
                                        ->join('m_sangyoi', function ($join) {
                                            $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                            $join->whereNull('m_sangyoi.deleted_at');
                                        })
                                        ->where('t_counseling_reserve.regist_id', $patient->id)
                                        ->select('m_sangyoi.id as id', 'm_sangyoi.name as name')
                                        ->orderBy('t_counseling_reserve.created_at', 'desc')
                                        ->groupBy('m_sangyoi.id', 't_counseling_reserve.created_at')
                                        ->get()
                                        // ->pluck('id')
                                        ->toArray();

            // Get 2 doctor nearest
            $doctorIds = [];
            $doctorNames = [];

            foreach($doctorQuery as $doctor) {
                if (!in_array($doctor['id'], $doctorIds) && (count($doctorIds) < 2)) {
                    array_push($doctorIds, $doctor['id']);
                    array_push($doctorNames, $doctor['name']);
                }
                if (count($doctorIds) > 2) break;
            }

            $client = MClient::find($patient->client_id);

            // Get doctor schedule for patient
            $result = [];

            $dateFrom = new Carbon($request->from);

            for ($i = 0; $i < $request->count; $i++) {
                $tempDateFrom = $dateFrom->format('Y-m-d');

                // Add array - schedule
                $result = [...$result, $tempDateFrom => []];

                // Time from: 00:00 - 23:30
                $timeDateFrom = new Carbon($tempDateFrom . '00:00');
                $timeDateTo = $timeDateFrom->copy()->addDay();

                // Check request type
                $scheduleTimeQuery = TSangyoiSchedule::where('t_sangyoi_schedule.schedule_date', $tempDateFrom);

                $scheduleTimeQuery->when($request->type == 0, function ($q) use ($client, $doctorIds) {
                    return $q->join('m_sangyoi', function ($join) {
                                $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                $join->whereNull('m_sangyoi.deleted_at');
                            })
                            ->leftJoin('m_maching_ng', function ($join) {
                                $join->on('m_maching_ng.sangyoi_id', '=', 'm_sangyoi.id');
                                $join->whereNull('m_maching_ng.deleted_at');
                            })
                            ->where(function ($query) use ($client) {
                                $query->where('m_maching_ng.client_id', '=', null)
                                    ->orWhere('m_maching_ng.client_id', '!=', $client->id);
                            })
                            ->where('m_sangyoi.chiiki_cd', '!=', $client->chiiki_cd)
                            ->where('m_sangyoi.chiiki_cd', '!=', 99)
                            ->whereNotIn('t_sangyoi_schedule.doctor_id', $doctorIds);
                });

                $scheduleTimeQuery->when($request->type == 1, function ($q) use ($doctorIds) {
                    return $q->where('t_sangyoi_schedule.doctor_id', $doctorIds[0]);
                });

                $scheduleTimeQuery->when($request->type == 2, function ($q) use ($doctorIds) {
                    return $q->where('t_sangyoi_schedule.doctor_id', $doctorIds[1]);
                });

                $scheduleTimeQuery = $scheduleTimeQuery->select(
                                        't_sangyoi_schedule.reserved_flg as reserved_flg',
                                        't_sangyoi_schedule.schedule_time_from as schedule_time_from',
                                        't_sangyoi_schedule.doctor_id as doctor_id'
                                    )
                                    ->groupBy('t_sangyoi_schedule.id')
                                    ->get();

                // Mapping result to new format
                $scheduleTime = [];

                foreach($scheduleTimeQuery as $item) {
                    $scheduleTime = [...$scheduleTime,
                        '' . $item->schedule_time_from . '' => [
                            'flg' => $item->reserved_flg,
                            'doctorId' => $item->doctor_id
                        ]
                    ];
                }

                // Format date to compare
                while($timeDateFrom->lessThan($timeDateTo)) {
                    // Change format to check exist with scheduleTime
                    $n = Carbon::now();
                    $testTime = (new Carbon($n->format('Y-m-d') . $timeDateFrom->format('H:i')))->format('Y-m-d H:i:s');

                    $checkTime = false;
                    $doctorId = '';
                    $doctorName = '';

                    if (count($scheduleTime) > 0) $checkTime = array_key_exists($testTime, (array) $scheduleTime);

                    if ($checkTime) {
                        $doctorId = $scheduleTime[$testTime]['doctorId'];
                        $doctorName = MSangyoi::find($doctorId)->name;
                        if ($scheduleTime[$testTime]['flg'] == 0) $color = 'blue';
                        else $color = 'yellow';
                    } else {
                        $color = 'grey';
                    }

                    array_push($result[$tempDateFrom], [
                        'date' => $tempDateFrom,
                        'time' => $timeDateFrom->format('H:i'),
                        'color' => $color,
                        'doctorId' => $doctorId,
                        'doctorName' => $doctorName
                    ]);

                    // Add 30 minutes
                    $timeDateFrom->addMinutes(30);
                }

                // Add 1 day
                $dateFrom->addDay();
            }

            // Reserve date nearest - patient
            $oldDate = false;
            $now = Carbon::now();
            $oldDateQuery = TCounselingReserve::where('regist_id', $patient->id)
                                            ->where('reserve_status', '!=', 2)
                                            ->orderBy('id', 'desc')
                                            ->first();

            if ($oldDateQuery) {
                $oldDoctor = TSangyoiSchedule::join('m_sangyoi', function ($join) {
                                                $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                                $join->whereNull('m_sangyoi.deleted_at');
                                            })
                                            ->select(
                                                'm_sangyoi.id as doctor_id',
                                                'm_sangyoi.name as doctor_name'
                                            )
                                            ->where('t_sangyoi_schedule.id', $oldDateQuery->sangyoi_schedule_id)
                                            ->first();

                $dateParam = new Carbon($oldDateQuery->reserve_date);
                $timeParam = new Carbon($oldDateQuery->reserve_time_from);
                $oldDateParam = new Carbon($dateParam->format('Y-m-d') . ' ' . $timeParam->format('H:i:s'));

                if ($oldDateParam->greaterThan($now)) {
                    $oldDate = [
                        'date' => $dateParam->format('Y-m-d'),
                        'time' => $timeParam->format('H:i'),
                        'doctorId' => $oldDoctor->doctor_id,
                        'doctorName' => $oldDoctor->doctor_name,
                    ];
                }
            }

            Log::info('result', [
                'schedule' => $result,
                'doctorNearest1' => isset($doctorIds[0]),
                'doctorNearest2' => isset($doctorIds[1]),
                'doctorNearest1Name' => isset($doctorNames[0]) ? $doctorNames[0] : '-',
                'doctorNearest2Name' => isset($doctorNames[1]) ? $doctorNames[1] : '-',
                'oldDate' => $oldDate
            ]);

            return $this->response(200, [
                'schedule' => $result,
                'doctorNearest1' => isset($doctorIds[0]),
                'doctorNearest2' => isset($doctorIds[1]),
                'doctorNearest1Name' => isset($doctorNames[0]) ? $doctorNames[0] : '-',
                'doctorNearest2Name' => isset($doctorNames[1]) ? $doctorNames[1] : '-',
                'oldDate' => $oldDate
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            Log::info('error', [$ex->getMessage()]);
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        try {
            $rules = [
                'doctorId' => ['required', 'integer'],
                'reserveDate' => ['required', 'date_format:Y-m-d'],
                'reserveTimeFrom' => ['required', 'date_format:H:i'],
                'noticeId' => ['required', 'integer'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'doctorId' => '産業医ID',
                'reserveDate' => '予約日',
                'reserveTimeFrom' => '予約時間From',
                'noticeId' => '面談予約通知ID',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            DB::beginTransaction();

            $account = auth()->guard('code')->user();
            $doctor = MSangyoi::find($request->doctorId);
            $meeting = $this->createZoomMeeting($doctor->zoom_client_id, $doctor->zoom_client_secret, $doctor->zoom_account_id);
            $clientUsers = MClientUser::where('client_id', $account->client_id)->where('user_company_id', $account->user_company_id)->get();
            $reportHospital = TReportHospital::where('reserve_issue_id', $request->noticeId)->first();
            $company = MUserCompany::find($doctor->user_company_id);
            $client = MClient::find($account->client_id);

            $sangyoiSche = TSangyoiSchedule::where('schedule_date', $request->reserveDate)
                                            ->where('schedule_time_from', $request->reserveTimeFrom)
                                            ->where('doctor_id', $request->doctorId)
                                            ->firstOrFail();
            $sangyoiSche->reserved_flg = 1;
            $sangyoiSche->save();

            $timeTo = (new Carbon($request->reserveDate . $request->reserveTimeFrom))->addMinutes(30);

            $notice = TCounselingReserveNotice::find($request->noticeId);
            $notice->implementation_status = 1;
            $notice->save();

            $pastNotice = TCounselingReserveNotice::where('employee_id', $notice->employee_id)
                                                    ->where('client_id', $notice->client_id)
                                                    ->where('user_company_id', $notice->user_company_id)
                                                    ->where('implementation_status', '!=', 9)
                                                    ->where('id', '!=', $notice->id)
                                                    ->first();

            $reserve = new TCounselingReserve();
            $reserve->reserve_issue_id = $request->noticeId;
            $reserve->sangyoi_schedule_id = $sangyoiSche->id;
            $reserve->reserve_date = $request->reserveDate;
            $reserve->reserve_time_from = $request->reserveTimeFrom;
            $reserve->reserve_time_to = $timeTo->format('H:i');
            ///
            $reserve->reserve_status = 0;
            if (isset($pastNotice)) {
                $reserve->counseling_type = 2;
            } else {
                if ($client->client_status == 1) {
                    $reserve->counseling_type = 0;
                } elseif ($client->client_status == 0) {
                    $reserve->counseling_type = 1;
                }
            }
            $reserve->zoom_meeting_id = $meeting['data']['id'];
            $reserve->zoom_meeting_pw = $meeting['data']['password'];
            $reserve->zoom_meeting_url = $meeting['data']['join_url'];
            $reserve->price = $doctor->price_1 ?? $doctor->price_2;
            ///
            $reserve->regist_id = $account->id;
            $reserve->update_id = $account->id;
            $reserve->save();

            $selfChecklist = $this->calculateScoreAnswer($request->noticeId);

            // Send mail to doctor, client and send sms to patient
            if ($reserve) {
                foreach($clientUsers as $clientUser) {
                    Mail::to($clientUser->mailaddr)->send(new ReservationCompleteEmailClientUser([
                        'clientUserName' => $clientUser->name,
                        'hirouSituationMemo' => $selfChecklist[2] ?? '',
                        'employeeName' => $account->name,
                        'sangyoiName' => $doctor->name,
                        'reserveDate' => $request->reserveDate,
                        'reserveTimeFrom' => $request->reserveTimeFrom,
                        'reserveTimeTo' => $timeTo->format('H:i'),
                        'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                        'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                    ]));
                }

                Log::info('noticeId', [$request->noticeId]);
                Log::info('report', [$reportHospital]);
                Log::info('client-user', [$clientUsers]);

                $cancelUrl = sprintf('%s/cp/sangyoi/cancel-or-lateness/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);

                $reportUrl = sprintf('%s/cp/sangyoi/hospital-detail/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $reserve->id);

                Mail::to($doctor->contact_mailaddr)->send(new ReservationCompleteEmail([
                    'sangyoiName' => $doctor->name,
                    'reserveDate' => $request->reserveDate,
                    'reserveTimeFrom' => $request->reserveTimeFrom,
                    'reserveTimeTo' => $timeTo->format('H:i'),
                    'zoomUrl' => $reserve->zoom_meeting_url,
                    'zoomId' => $reserve->zoom_meeting_id,
                    'zoomPassword' => $reserve->zoom_meeting_pw,
                    'companyName' => $company->user_company_name,
                    'cancelUrl' => $cancelUrl,
                    'reportUrl' => $reportUrl,
                    'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                    'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR']
                ]));

                $url = sprintf('%s/auth/forward-to-email-interview/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $request->noticeId);
                $url2 = sprintf('%s/schedule/cancel/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $request->noticeId);

                $content = "【面接おまかせくん】
面接予約が完了しました。
{$request->reserveDate} {$request->reserveTimeFrom} ~ {$timeTo->format('H:i')}
面接指導実施医師 ：{$doctor->name}

zoom面接情報
ミーティングID:{$reserve->zoom_meeting_id}
ミーティングPW:{$reserve->zoom_meeting_pw}
リンク：{$reserve->zoom_meeting_url}

PCへの転送を希望の方は下記のリンクから転送先のメールアドレスを入力してください。
{$url}

面接予約の変更を行う場合は下記のリンクから行なってください。
{$url2}";

                $this->sendSMS($account->sms_number, $content);
            }

            DB::commit();
            return $this->response(200, [
                'result' => $reserve ? true : false
            ], __('text.store_succeed', ['attribute' => '面接日予約']));
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => '面接日予約']));
        }
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request) {
        try {
            $rules = [
                'oldDoctorId' => ['required', 'integer'],
                'oldReserveDate' => ['required', 'date_format:Y-m-d'],
                'oldReserveTimeFrom' => ['required', 'date_format:H:i'],
                'doctorId' => ['required', 'integer'],
                'reserveDate' => ['required', 'date_format:Y-m-d'],
                'reserveTimeFrom' => ['required', 'date_format:H:i'],
                'noticeId' => ['required', 'integer']
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'oldDoctorId' => '産業医ID',
                'oldReserveDate' => '予約日',
                'oldReserveTimeFrom' => '予約時間From',
                'doctorId' => '産業医ID',
                'reserveDate' => '予約日',
                'reserveTimeFrom' => '予約時間From',
                'noticeId' => '面談予約通知ID',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            DB::beginTransaction();

            $account = auth()->guard('code')->user();

            // Delete old
            $sangyoiScheOld = TSangyoiSchedule::where('schedule_date', $request->oldReserveDate)
                                            ->where('schedule_time_from', $request->oldReserveTimeFrom)
                                            ->where('doctor_id', $request->oldDoctorId)
                                            ->firstOrFail();
            $sangyoiScheOld->reserved_flg = 0;
            $sangyoiScheOld->save();

            $reserveOld = TCounselingReserve::where('sangyoi_schedule_id', $sangyoiScheOld->id)->firstOrFail();
            $reserveOld->delete();

            // Add new
            $sangyoiSche = TSangyoiSchedule::where('schedule_date', $request->reserveDate)
                                            ->where('schedule_time_from', $request->reserveTimeFrom)
                                            ->where('doctor_id', $request->doctorId)
                                            ->firstOrFail();
            $sangyoiSche->reserved_flg = 1;
            $sangyoiSche->save();

            $timeTo = (new Carbon($request->reserveDate . $request->reserveTimeFrom))->addMinutes(30);
            $doctor = MSangyoi::find($request->doctorId);

            $meeting = $this->createZoomMeeting($doctor->zoom_client_id, $doctor->zoom_client_secret, $doctor->zoom_account_id);

            $client = MClient::find($account->client_id);
            $notice = TCounselingReserveNotice::find($request->noticeId);
            $notice->implementation_status = 1;
            $notice->save();

            $pastNotice = TCounselingReserveNotice::where('employee_id', $notice->employee_id)
                                                    ->where('client_id', $notice->client_id)
                                                    ->where('user_company_id', $notice->user_company_id)
                                                    ->where('implementation_status', '!=', 9)
                                                    ->where('id', '!=', $notice->id)
                                                    ->first();

            $reserve = new TCounselingReserve();
            $reserve->reserve_issue_id = $request->noticeId;
            $reserve->sangyoi_schedule_id = $sangyoiSche->id;
            $reserve->reserve_date = $request->reserveDate;
            $reserve->reserve_time_from = $request->reserveTimeFrom;
            $reserve->reserve_time_to = $timeTo->format('H:i');
            //
            $reserve->reserve_status = 0;
            if (isset($pastNotice)) {
                $reserve->counseling_type = 2;
            } else {
                if ($client->client_status == 1) {
                    $reserve->counseling_type = 0;
                } elseif ($client->client_status == 0) {
                    $reserve->counseling_type = 1;
                }
            }
            $reserve->zoom_meeting_id = $meeting['data']['id'];
            $reserve->zoom_meeting_pw = $meeting['data']['password'];
            $reserve->zoom_meeting_url = $meeting['data']['join_url'];
            $reserve->price = $doctor->price_1 ?? $doctor->price_2;
            //
            $reserve->regist_id = $account->id;
            $reserve->update_id = $account->id;
            $reserve->save();

            $company = MUserCompany::find($doctor->user_company_id);
            $sangyoiName = $doctor->name;

            // Send mail to doctor, send sms to patient
            if ($reserve) {
                $cancelUrl = sprintf('%s/cp/sangyoi/cancel-or-lateness/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);
                $loginUrl = sprintf('%s/cp/sangyoi/login/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);

                Mail::to($doctor->contact_mailaddr)->send(new ChangeScheduleReservationCompleteEmail([
                    'sangyoiName' => $doctor->name,
                    'reserveDate' => $request->reserveDate,
                    'reserveTimeFrom' => $request->reserveTimeFrom,
                    'reserveTimeTo' => $timeTo->format('H:i'),
                    'zoomUrl' => $reserve->zoom_meeting_url,
                    'zoomId' => $reserve->zoom_meeting_id,
                    'zoomPassword' => $reserve->zoom_meeting_pw,
                    'companyName' => $company->user_company_name,
                    'cancelUrl' => $cancelUrl,
                    'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                    'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                    'loginUrl' => $loginUrl
                ]));

                $url = sprintf('%s/auth/forward-to-email-interview/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $request->noticeId);
                $url2 = sprintf('%s/schedule/cancel/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $request->noticeId);

                $content = "【面接おまかせくん】
面接予約が完了しました。
{$request->reserveDate} {$request->reserveTimeFrom} ~ {$timeTo->format('H:i')}
面接指導実施医師 ：{$doctor->name}

zoom面接情報
ミーティングID:{$reserve->zoom_meeting_id}
ミーティングPW:{$reserve->zoom_meeting_pw}
リンク：{$reserve->zoom_meeting_url}

PCへの転送を希望の方は下記のリンクから転送先のメールアドレスを入力してください。
{$url}

面接予約の変更を行う場合は下記のリンクから行なってください。
{$url2}";

                $this->sendSMS($account->sms_number, $content);
            }

            DB::commit();
            return $this->response(200, [
                'result' => $reserve ? true : false,
                'sangyoiName' => $sangyoiName
            ], __('text.update_succeed', ['attribute' => '面接日予約']));
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => '面接日予約']));
        }
    }

    /**
     * Cancel schedule.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancel(Request $request) {
        try {
            $patient = auth()->guard('code')->user();

            $employee = TCounselingReserveNotice::join('m_client_employee', function ($join) {
                            $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                            $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                            $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                            $join->whereNull('m_client_employee.deleted_at');
                        })
                        ->where('t_counseling_reserve_notice.id', $request->noticeId)
                        ->select('m_client_employee.id as id')
                        ->first();

            $counselingReserve = TCounselingReserve::where('reserve_issue_id', $request->noticeId)
                                                    ->orderBy('id', 'desc')
                                                    ->first();

            if($patient->id != $employee->id) {
                return $this->response(422, [], __('text.invalid_notice'));
            }

            $now = Carbon::now();

            // if ($counselingReserve) {
            //     $dateParam = new Carbon($counselingReserve->reserve_date);
            //     $timeParam = new Carbon($counselingReserve->reserve_time_from);
            //     $oldDateParam = new Carbon($dateParam->format('Y-m-d') . ' ' . $timeParam->format('H:i:s'));

            //     if ($oldDateParam->lessThanOrEqualTo($now)) {
            //         return $this->response(422, [], __('text.invalid_cancel_date'));
            //     }
            // } else {
            //     return $this->response(422, [], __('text.invalid_cancel_date'));
            // }

            $sangyoiScheOld = TSangyoiSchedule::find($counselingReserve->sangyoi_schedule_id);
            $doctor = MSangyoi::find($sangyoiScheOld->doctor_id);
            $users = MUser::where('user_company_id', $doctor->user_company_id)->get();
            $reportHospital = TReportHospital::where('reserve_issue_id', $request->noticeId)->first();
            $tel = env('ENV_TEL') ?: $_SERVER['ENV_TEL'];
            $hour = env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'];

            if ($request->reserveStatus == 2) {
                // Update flg sangyoi schedule if cancel
                $sangyoiScheOld->reserved_flg = 0;
                $sangyoiScheOld->save();
                //Update notice
                $notice = TCounselingReserveNotice::find($request->noticeId);
                $notice->implementation_status = 9;
                $notice->save();
            }

            // Update reserve
            $counselingReserve->reserve_status = $request->reserveStatus;
            $counselingReserve->cancel_date = $now->format('Y-m-d');
            $counselingReserve->cancel_person_type = 0;
            $counselingReserve->cancel_reason = $request->cancelReason;
            $counselingReserve->save();

            // Send sms, email
            if ($counselingReserve->reserve_status == 2) {
                foreach ($users as $user) {
                    Mail::to($user->mailaddr)->send(new CancelEmailUser([
                        'hosId' => $reportHospital->id ?? '',
                        'noticeId' => $request->noticeId,
                        'employeeName' => $patient->name,
                        'sangyoiName' => $doctor->name,
                        'reason' => $request->cancelReason
                    ]));
                }

                Mail::to($doctor->contact_mailaddr)->send(new CancelEmailSangyoi([
                    'hosId' => $reportHospital->id ?? '',
                    'noticeId' => $request->noticeId,
                    'employeeName' => $patient->name,
                    'sangyoiName' => $doctor->name,
                    'reason' => $request->cancelReason,
                    'tel' => $tel,
                    'hour' => $hour
                ]));

//                 $content = "【面接おまかせくん】{$patient->name}様
// 大変申し訳ございませんが、面接指導実施医師の都合により面接がキャンセルされました。

// 面接詳細
// 日時：{$dateParam->format('Y-m-d')} {$timeParam->format('H:i')} ~ {$timeParam->copy()->addMinutes(30)->format('H:i')}
// 面接指導実施医師：{$doctor->name}

// キャンセル理由：
// 急患発生のため。

// つきまして、下記のリンクから再度面接日をご予約いただきたく存じます。

// https://omkse.jp/SERUHUTY

// ご不明な点があれば下記の連絡先へご連絡ください。
// 日本産業医支援機構TEL：{$tel}
// 問合せ時間　{$hour}";

//                 $this->sendSMS($patient->sms_number, $content);
            } else {
                foreach ($users as $user) {
                    Mail::to($user->mailaddr)->send(new LateEmailUser([
                        'hosId' => $reportHospital->id ?? '',
                        'noticeId' => $request->noticeId,
                        'employeeName' => $patient->name,
                        'sangyoiName' => $doctor->name,
                        'reason' => $request->cancelReason
                    ]));
                }

                Mail::to($doctor->contact_mailaddr)->send(new LateEmailSangyoi([
                    'hosId' => $reportHospital->id ?? '',
                    'noticeId' => $request->noticeId,
                    'employeeName' => $patient->name,
                    'sangyoiName' => $doctor->name,
                    'reason' => $request->cancelReason,
                    'tel' => $tel,
                    'hour' => $hour
                ]));

//                 $content = "【面接おまかせくん】{$patient->name}様
// 大変申し訳ございませんが、面接指導実施医師から遅刻連絡です。

// 面接詳細
// 日時：{$dateParam->format('Y-m-d')} {$timeParam->format('H:i')} ~ {$timeParam->copy()->addMinutes(30)->format('H:i')}
// 面接指導実施医師：{$doctor->name}

// 遅刻理由：
// 急患発生のため。

// 面接指導実施医師がzoomに入るまでお待ちいただけますようお願いいたします。

// ご不明な点があれば下記の連絡先へご連絡ください。
// 日本産業医支援機構TEL：{$tel}
// 問合せ時間　{$hour}";

//                 $this->sendSMS($patient->sms_number, $content);
            }

            return $this->response(200, [
                'result' => $counselingReserve ? true : false
            ], __('text.delete_succeed', ['attribute' => '面接日予約']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.delete_failed', ['attribute' => '面接日予約']));
        }
    }

    public function checkSurvey(Request $request) {
        try {
            $patient = auth()->guard('code')->user();

            $employee = TCounselingReserveNotice::join('m_client_employee', function ($join) {
                                                    $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                    $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                    $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                    $join->whereNull('m_client_employee.deleted_at');
                                                })
                                                ->where('t_counseling_reserve_notice.id', $request->noticeId)
                                                ->select('m_client_employee.id as id')
                                                ->first();

            // Check notice with employee
            $noticeIdInvalid = true;
            if(!isset($employee) || $employee->id != $patient->id) {
                $noticeIdInvalid = false;

                Log::info('noticeIdInvalid', [
                    'employee' => $employee,
                    'patient' => $patient
                ]);

                return $this->response(422, [
                    'noticeIdInvalid' => $noticeIdInvalid
                ], __('text.invalid_notice'));
            }

            $questionnaireLv1 = MQuestionnaire::select('question_lev1_no')
                                                ->orderBy('question_lev1_no', 'desc')
                                                ->distinct()
                                                ->first();

            $qAnswerLv1 = TQuestionAnswer::select('question_lev1_no', 'question_lev2_no')
                                                ->orderBy('question_lev1_no', 'desc')
                                                ->orderBy('question_lev2_no', 'desc')
                                                ->where('reserve_issue_id', $request->noticeId)
                                                ->distinct()
                                                ->first();

            $kihoHospital = TKihoninfHospital::where('reserve_issue_id', $request->noticeId)->first();

            $qAnswerLv1No = 0;
            $level = null;
            if ($qAnswerLv1) {
                $checkNextStep = MQuestionnaire::select('question_lev1_no', 'question_lev2_no')
                                                ->where('question_lev1_no', $qAnswerLv1->question_lev1_no)
                                                ->orderBy('question_lev2_no', 'desc')
                                                ->first();

                if ($checkNextStep->question_lev2_no == $qAnswerLv1->question_lev2_no) {
                    $questionLev1No = $qAnswerLv1->question_lev1_no + 1;
                    $questionLev2No = 1;
                } else {
                    $questionLev1No = $qAnswerLv1->question_lev1_no;
                    $questionLev2No = $qAnswerLv1->question_lev2_no + 1;
                }

                // Last step
                $qAnswerLv1No = $qAnswerLv1->question_lev1_no;
                $level = [
                    'questionLev1No' => $questionLev1No,
                    'questionLev2No' => $questionLev2No,
                    'lastStep' => $questionnaireLv1->question_lev1_no == $qAnswerLv1No && $checkNextStep->question_lev2_no == $qAnswerLv1->question_lev2_no
                ];
            }

            $check = false;
            if (isset($kihoHospital) && ($questionnaireLv1->question_lev1_no == $qAnswerLv1No) && ($patient->id == $employee->id)) {
                $check = true;
                $level = null;
            }

            // Check nearest date to cancel/late
            $counselingReserve = TCounselingReserve::where('reserve_issue_id', $request->noticeId)
                                                    ->orderBy('id', 'desc')
                                                    ->first();

            $checkCancel = [
                'cancel' => false,
                'late' => false
            ];

            if (isset($counselingReserve)) {
                if ($counselingReserve->reserve_status == 2) {
                    $checkCancel['cancel'] = true;
                } elseif ($counselingReserve->reserve_status == 1) {
                    $checkCancel['late'] = true;
                }
            }

            Log::info('result-check', [
                'result' => $check,
                'level' => $level,
                'noticeIdInvalid' => $noticeIdInvalid,
                'checkCancel' => $checkCancel
            ]);

            return $this->response(200, [
                'result' => $check,
                'level' => $level,
                'noticeIdInvalid' => $noticeIdInvalid,
                'checkCancel' => $checkCancel
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            Log::info('error-check', [$ex->getMessage()]);
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

}
