<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForwardedEmailInterview;
use App\Mail\ForwardedEmailSurvey;
use App\Models\MClientEmployee;
use App\Models\TCounselingReserve;
use App\Models\TCounselingReserveNotice;
use App\Models\TSangyoiSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class QuestionTableController extends Controller
{
    /**
     * Create a new CertificationCodeController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Send forwarded email survey.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendForwardedEmailSurvey(Request $request) {
        try {
            $rules = [
                'mailaddr' => ['required', 'string', 'max:254'],
                'token' => ['required', 'string'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'mailaddr' => 'メールアドレス'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $employee = MClientEmployee::where('token', $request->token)->first();

            $url = sprintf('%s/survey/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $request->noticeId);

            Mail::to($request->mailaddr)->send(new ForwardedEmailSurvey([
                'employeeName' => $employee->name,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'url' => $url
            ]));

            return $this->response(200, [
                'result' => true
            ], __('text.send_mail_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.send_mail_failed'));
        }
    }

    /**
     * Send forwarded email interview.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendForwardedEmailInterview(Request $request) {
        try {
            $rules = [
                'mailaddr' => ['required', 'string', 'max:254'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'mailaddr' => 'メールアドレス'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $account = auth()->guard('code')->user();
            $dateParam = Carbon::now();
            $timeParam = Carbon::now();

            $counselingReserve = TCounselingReserve::where('reserve_issue_id', $request->noticeId)->orderBy('id', 'desc')->first();
            if ($counselingReserve) {
                $sangyoi = TSangyoiSchedule::join('m_sangyoi', function ($join) {
                                                $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                                $join->whereNull('m_sangyoi.deleted_at');
                                            })
                                            ->where('t_sangyoi_schedule.id', $counselingReserve->sangyoi_schedule_id)
                                            ->select('m_sangyoi.name as name')
                                            ->first();

                $dateParam = new Carbon($counselingReserve->reserve_date);
                $timeParam = new Carbon($counselingReserve->reserve_time_from);
            }

            $url = sprintf('%s/survey/?id=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $request->noticeId);

            Mail::to($request->mailaddr)->send(new ForwardedEmailInterview([
                'reserveDate' => $dateParam->format('Y-m-d') ?? '',
                'reserveTimeFrom' => $timeParam->format('H:i') ?? '',
                'reserveTimeTo' => $timeParam->copy()->addMinutes(30)->format('H:i'),
                'sangyoiName' => $sangyoi->name ?? '',
                'zoomUrl' => $counselingReserve->zoom_meeting_url ?? '',
                'zoomId' => $counselingReserve->zoom_meeting_id ?? '',
                'zoomPw' => $counselingReserve->zoom_meeting_pw ?? '',
                'url' => $url ?? ''
            ]));

            return $this->response(200, [
                'result' => true
            ], __('text.send_mail_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.send_mail_failed'));
        }
    }
}
