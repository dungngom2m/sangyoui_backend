<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Mail\CancelEmailSangyoiUser;
use App\Mail\LateEmailSangyoiUser;
use App\Models\MClientEmployee;
use App\Models\MUser;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TReportHospital;
use App\Models\TSangyoiSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SangyoiScheduleController extends Controller
{
    private const dayOfWeek = [
        [
            'label' => '月曜日',
            'id' => 1
        ],
        [
            'label' => '火曜日',
            'id' => 2
        ],
        [
            'label' => '水曜日',
            'id' => 3
        ],
        [
            'label' => '木曜日',
            'id' => 4
        ],
        [
            'label' => '金曜日',
            'id' => 5
        ],
        [
            'label' => '土曜日',
            'id' => 6
        ],
        [
            'label' => '日曜日',
            'id' => 0
        ],
    ];

    public const cancelReasonKbn = [
        [
            'label' => '急患発生',
            'id' => 0
        ],
        [
            'label' => '他医師欠勤',
            'id' => 1
        ],
        [
            'label' => '体調不良',
            'id' => 2
        ],
        [
            'label' => 'その他',
            'id' => 3
        ]
    ];

    public const cancelDelayKbn = [
        [
            'label' => 'キャンセル',
            'id' => 0
        ],
        [
            'label' => '遅刻',
            'id' => 1
        ],
    ];
    /**
     * Create a new SangyoiScheduleController instance.
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
            $account = auth()->guard('sangyoi')->user();

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
                                ->where('doctor_id', $account->id)
                                ->get()->pluck('reserved_flg', 'schedule_time_from');

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
                'schedule' => $result,
                'dayOfWeek' => self::dayOfWeek
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store schedule date.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        try {
            $account = auth()->guard('sangyoi')->user();

            foreach($request->scheduleDate as $date) {
                foreach($request->scheduleTimeFrom[$date] as $timeFrom) {
                    if ($timeFrom['color'] == 'grey') {
                        $schedule = TSangyoiSchedule::where('schedule_date', $date)
                            ->where('schedule_time_from', $timeFrom['time'])
                            ->where('reserved_flg', '0')
                            ->where('doctor_id', $account->id)
                            ->first();

                        if ($schedule) $schedule->delete();
                    } else if ($timeFrom['color'] == 'blue') {
                        $schedule = TSangyoiSchedule::where('schedule_date', $date)
                            ->where('schedule_time_from', $timeFrom['time'])
                            ->where('doctor_id', $account->id)
                            ->first();

                        if (!$schedule) {
                            $schedule = new TSangyoiSchedule();
                            $schedule->doctor_id = $account->id;
                            $schedule->schedule_date = $date;
                            $schedule->schedule_time_from = $timeFrom['time'];
                            $schedule->regist_id = $account->id;
                            $schedule->update_id = $account->id;
                            $schedule->save();
                        } else {
                            // Delete cancel counseling reserve before
                            $counselingReserve = TCounselingReserve::where('reserve_date', $date)
                                                    ->where('reserve_time_from', $timeFrom['time'])
                                                    ->where('cancel_delay_kbn', 0)
                                                    ->first();

                            if (isset($counselingReserve)) {
                                $counselingReserve->delete();
                                $schedule->reserved_flg = 0;
                                $schedule->save();
                            }
                        }
                    }
                }
            }

            return $this->response(200, [
                'result' => true
            ], __('text.store_succeed', ['attribute' => '産業医スケジュール']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => '産業医スケジュール']));
        }
    }

    /**
     * Store multi schedule date.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeMulti(Request $request) {
        try {
            $account = auth()->guard('sangyoi')->user();

            $firstDay = Carbon::now();

            $endDay = null;

            switch ($request->monthOption) {
                case 0:
                    $endDay = $firstDay->copy()->addMonth();
                    break;
                case 1:
                    $endDay = $firstDay->copy()->addMonths(3);
                    break;
                case 2:
                    $endDay = $firstDay->copy()->addMonths(6);
                    break;
                case 3:
                    $endDay = $firstDay->copy()->addYear();
                    break;
                default:
                    $endDay = $firstDay->copy()->addMonth();
            }

            while ($firstDay->lessThanOrEqualTo($endDay)) {
                if ($firstDay->dayOfWeek == $request->dayOfWeek) {
                    // Time
                    $timeDateFrom = new Carbon($firstDay->copy()->format('Y-m-d') . $request->timeFrom);
                    $timeDateTo = new Carbon($firstDay->copy()->format('Y-m-d') . $request->timeTo);

                    if ($timeDateFrom->greaterThan($timeDateTo)) {
                        $timeDateTo = new Carbon($firstDay->copy()->addDay()->format('Y-m-d') . $request->timeTo);
                    }

                    // Format date to compare
                    while($timeDateFrom->lessThanOrEqualTo($timeDateTo)) {
                        $tempScheduleDate = $timeDateFrom->copy()->format('Y-m-d');
                        $tempScheduleTimeFrom = $timeDateFrom->copy()->format('H:i');

                        $schedule = TSangyoiSchedule::where('schedule_date', $tempScheduleDate)
                            ->where('schedule_time_from', $tempScheduleTimeFrom)
                            ->where('doctor_id', $account->id)
                            ->first();

                        if (!$schedule) {
                            $schedule = new TSangyoiSchedule();
                            $schedule->doctor_id = $account->id;
                            $schedule->schedule_date = $tempScheduleDate;
                            $schedule->schedule_time_from = $tempScheduleTimeFrom;
                            $schedule->regist_id = $account->id;
                            $schedule->update_id = $account->id;
                            $schedule->save();
                        } else {
                            // Delete cancel counseling reserve before
                            $counselingReserve = TCounselingReserve::where('reserve_date', $tempScheduleDate)
                                                    ->where('reserve_time_from', $tempScheduleTimeFrom)
                                                    ->where('cancel_delay_kbn', 0)
                                                    ->first();

                            if (isset($counselingReserve)) {
                                $counselingReserve->delete();
                                $schedule->reserved_flg = 0;
                                $schedule->save();
                            }
                        }

                        // Add 30 minutes
                        $timeDateFrom->addMinutes(30);
                    }
                }

                $firstDay->addDay();
            }

            return $this->response(200, [
                'result' => true
            ], __('text.store_succeed', ['attribute' => '産業医スケジュール']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => '産業医スケジュール']));
        }
    }

    /**
     * Get counseling reserve option.
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelOption() {
        try {
            $now = Carbon::now();
            $account = auth()->guard('sangyoi')->user();
            $options = [];

            $list = TCounselingReserve::join('t_sangyoi_schedule', function ($join) {
                                        $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                        $join->whereNull('t_sangyoi_schedule.deleted_at');
                                    })
                                    ->join('m_sangyoi', function ($join) {
                                        $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                        $join->whereNull('m_sangyoi.deleted_at');
                                    })
                                    ->where('m_sangyoi.id', $account->id)
                                    ->where(function($query) {
                                        $query->where('t_counseling_reserve.reserve_status', '=', 0)
                                            ->orWhere('t_counseling_reserve.reserve_status', '=', 1);
                                    })
                                    ->where(function($query) {
                                        $query->whereNull('t_counseling_reserve.cancel_delay_kbn')
                                            ->orWhere('t_counseling_reserve.cancel_delay_kbn', '=', 1);
                                    })
                                    ->select(
                                        't_counseling_reserve.id as id'
                                    )
                                    ->get();

            foreach($list as $item) {
                $options = [...$options, [
                    'label' => $item->id,
                    'id' => $item->id
                ]];
            }

            Log::info('list', [$list]);
            Log::info('options', [$options]);
            Log::info('account', [$account]);

            return $this->response(200, [
                'reserveOptions' => $options,
                'cancelDelayKbnOptions' => self::cancelDelayKbn,
                'cancelReasonKbnOptions' => self::cancelReasonKbn
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Cancel schedule.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancel(Request $request) {
        try {
            $rules = [
                'counselingReserveId' => ['required', 'integer'],
                'cancelDelayKbn' => ['required', 'integer'],
                'cancelReasonKbn' => ['required', 'integer'],
                'cancelReason' => ['nullable', 'string', 'max:1000'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            DB::beginTransaction();

            $account = auth()->guard('sangyoi')->user();

            $reserve = TCounselingReserve::find($request->counselingReserveId);
            $notice = TCounselingReserveNotice::find($reserve->reserve_issue_id);
            $notice->implementation_status = 9;
            $notice->save();

            // $sangyoiSchedule = TSangyoiSchedule::find($reserve->sangyoi_schedule_id);
            $employee = MClientEmployee::where('user_company_id', $notice->user_company_id)
                                        ->where('client_id', $notice->client_id)
                                        ->where('employee_number', $notice->employee_id)
                                        ->first();
            $now = Carbon::now();

            $reason = null;
            foreach(self::cancelReasonKbn as $item) {
                if ($request->cancelReasonKbn == $item['id']) {
                    $reason = $request->cancelReasonKbn == 3 ? $request->cancelReason : $item['label'];
                    break;
                }
            }

            if ($request->cancelDelayKbn == 0) {
                $reserve->reserve_status = 2;
                $reserve->cancel_person_type = 1;
                $reserve->cancel_date = $now->format('Y-m-d');
                $reserve->cancel_delay_kbn = $request->cancelDelayKbn;
                $reserve->cancel_reason_kbn = $request->cancelReasonKbn;
                $reserve->cancel_reason = $reason ?? null;
                $reserve->save();

                // $sangyoiSchedule->reserved_flg = 0;
                // $sangyoiSchedule->save();
            } else {
                $reserve->reserve_status = 1;
                $reserve->cancel_person_type = 1;
                $reserve->cancel_date = $now->format('Y-m-d');
                $reserve->cancel_delay_kbn = $request->cancelDelayKbn;
                $reserve->cancel_reason_kbn = $request->cancelReasonKbn;
                $reserve->cancel_reason = $reason ?? null;
                $reserve->save();
            }

            $users = MUser::where('user_company_id', $account->user_company_id)->get();
            $reportHospital = TReportHospital::where('reserve_issue_id', $notice->id)->first();
            $tel = env('ENV_TEL') ?: $_SERVER['ENV_TEL'];
            $hour = env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'];
            $dateParam = new Carbon($reserve->reserve_date);
            $timeParam = new Carbon($reserve->reserve_time_from);

            // Send sms, email
            if ($request->cancelDelayKbn == 0) {
                foreach ($users as $user) {
                    Mail::to($user->mailaddr)->send(new CancelEmailSangyoiUser([
                        'hosId' => $reportHospital->id ?? '',
                        'reserveId' => $request->counselingReserveId,
                        'employeeName' => $employee->name,
                        'sangyoiName' => $account->name,
                        'reason' => $reason ?? ''
                    ]));
                }

                $url = sprintf('%s/survey/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $notice->id);

                $content = "【面接おまかせくん】{$employee->name}様
大変申し訳ございませんが、面接指導実施医師の都合により面接がキャンセルされました。

面接詳細
日時：{$dateParam->format('Y-m-d')} {$timeParam->format('H:i')} ~ {$timeParam->copy()->addMinutes(30)->format('H:i')}
面接指導実施医師：{$account->name}

キャンセル理由：
{$reason}

つきまして、下記のリンクから再度面接日をご予約いただきたく存じます。

{$url}

ご不明な点があれば下記の連絡先へご連絡ください。
日本産業医支援機構TEL：{$tel}
問合せ時間　{$hour}";

                $this->sendSMS($employee->sms_number, $content);
            } else {
                foreach ($users as $user) {
                    Mail::to($user->mailaddr)->send(new LateEmailSangyoiUser([
                        'hosId' => $reportHospital->id ?? '',
                        'reserveId' => $request->counselingReserveId,
                        'employeeName' => $employee->name,
                        'sangyoiName' => $account->name,
                        'reason' => $reason ?? ''
                    ]));
                }

                $content = "【面接おまかせくん】{$employee->name}様
大変申し訳ございませんが、面接指導実施医師から遅刻連絡です。

面接詳細
日時：{$dateParam->format('Y-m-d')} {$timeParam->format('H:i')} ~ {$timeParam->copy()->addMinutes(30)->format('H:i')}
面接指導実施医師：{$account->name}

遅刻理由：
{$reason}

面接指導実施医師がzoomに入るまでお待ちいただけますようお願いいたします。

ご不明な点があれば下記の連絡先へご連絡ください。
日本産業医支援機構TEL：{$tel}
問合せ時間　{$hour}";

                $this->sendSMS($employee->sms_number, $content);
            }

            DB::commit();
            return $this->response(200, [
                'result' => true
            ], __('text.delete_succeed', ['attribute' => '']));
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.delete_failed', ['attribute' => '']));
        }
    }
}
