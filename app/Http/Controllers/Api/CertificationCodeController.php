<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificationCodeResource;
use App\Models\MClientEmployee;
use App\Models\TCertificationCode;
use App\Models\TCounselingReserveNotice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificationCodeController extends Controller
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
     * Store a certification code.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'smsNumber' => ['required', 'string', 'max:11'],
            ];

            $employee = MClientEmployee::where('sms_number', $request->smsNumber)->where('retirement_flg', 0)->first();

            if ($employee) {
                $codeRandom = sprintf("%04d", mt_rand(1, 9999));
                while (true) {
                    $result = TCertificationCode::where('certification_code', $codeRandom)->first();
                    if (!$result) break;
                    else $codeRandom = sprintf("%04d", mt_rand(1, 9999));
                }

                $validator = Validator::make($request->all(), $rules, [], [
                    'smsNumber' => 'SMS番号'
                ]);
                if ($validator->fails()) {
                    return $this->response(422, [], '', $validator->errors());
                }

                // Check notice id
                if ($request->noticeId) {
                    $employeeNotice = TCounselingReserveNotice::join('m_client_employee', function ($join) {
                                                            $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                            $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                            $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                            $join->whereNull('m_client_employee.deleted_at');
                                                        })
                                                        ->where('t_counseling_reserve_notice.id', $request->noticeId)
                                                        ->select('m_client_employee.id as id')
                                                        ->first();

                    if(!isset($employeeNotice) || $employeeNotice->id != $employee->id) {
                        return $this->response(422, [], __('text.invalid_notice'));
                    }
                } else {
                    return $this->response(422, [], __('text.invalid_notice'));
                }

                // Update code if sms number exist
                $cerCode = TCertificationCode::where('sms_number', $request->smsNumber)->first();
                if ($cerCode) {
                    $cerCode->certification_code = $codeRandom;
                    $cerCode->certification_status = 0;
                    $cerCode->save();
                } else {
                    $cerCode = new TCertificationCode();
                    $cerCode->sms_number = $request->smsNumber;
                    $cerCode->certification_code = $codeRandom;
                    $cerCode->save();
                }

                // $date = (new Carbon($cerCode->updated_at))->addMinutes(10);

                // Send SMS
                $content = "【面接おまかせくん】
『{$codeRandom}』
認証コード番号入力画面で上記4桁の数字を入力してください。
有効期限：10分";

                $resultSendSms = $this->sendSMS($request->smsNumber, $content);

                return $this->response(200, [
                    'certification_code' => new CertificationCodeResource($cerCode),
                    'resultSendSms' => $resultSendSms
                ], __('text.certification_code_succeed'));
            } else {
                return $this->response(400, [], __('text.certification_code_failed'));
            }
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.certification_code_failed'));
        }
    }

    /**
     * Verify certification code.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        try {
            $rules = [
                'certificationCode' => ['required', 'string', 'max:4'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'certificationCode' => '認証コード',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $cerCode = TCertificationCode::where('certification_code', $request->certificationCode)->firstOrFail();
            $endDateVerify = (new Carbon($cerCode->updated_at))->addMinutes(10);
            $now = Carbon::now()->format('Y-m-d H:i:s');

            $employee = MClientEmployee::where('sms_number', $cerCode->sms_number)->first();

            // Check end datetime code (+10 minutes)
            if ($endDateVerify->greaterThan($now) && $employee) {
                $verifyResult = true;
                $token = auth()->guard('code')->login($employee);
                $cerCode->certification_status = 1;
                $cerCode->save();
            } else {
                $verifyResult = false;
                $cerCode->forceDelete();
                $token = '';
            }

            return $this->response(200, [
                'verifyResult' => $verifyResult,
                'accessToken' => $token
            ], __('text.verify_code_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.verify_code_failed'));
        }
    }
}
