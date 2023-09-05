<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Http\Resources\StaffResource;
use App\Mail\FindPassword;
use App\Mail\LoginEmail;
use App\Models\MClient;
use App\Models\MClientUser;
use App\Models\MSangyoi;
use App\Models\MUser;
use App\Models\MUserCompany;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $auth;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Login.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $rules = [
                'type' => ['string'],
                'mailaddr' => ['required', 'string', 'max:254'],
                'password' => ['required', 'string', 'min: 6', 'max: 100'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'mailaddr' => 'メールアドレス',
                'password' => 'パスワード',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            Log::info('account', [$request->mailaddr, $request->password]);

            // Check type
            if ($request->type == 'clientUser') {
                $token = auth()->guard('clientUser')->attempt(request(['mailaddr', 'password']));
            } else if ($request->type == 'sangyoi') {
                $token = auth()->guard('sangyoi')->attempt(['contact_mailaddr' => $request->mailaddr, 'password' => $request->password]);
            } else {
                $token = auth()->guard('user')->attempt(request(['mailaddr', 'password']));
            }

            Log::info('token', [$token]);

            if (!$token) {
                return $this->response(422, [], __('text.login_failed'));
            }

            return $this->response(200, [
                'accessToken' => $token
            ], __('text.login_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.login_failed'));
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        if ($request->type == 'clientUser') {
            $account = auth()->guard('clientUser')->user();
            $clientName = MClient::find($account->client_id)->client_name;
            $account->company_name = $clientName;
        } elseif ($request->type == 'sangyoi') {
            $account = auth()->guard('sangyoi')->user();
            $company = MUserCompany::find($account->user_company_id);
            $account->company_name = $company->user_company_name;
        } else {
            $account = auth()->guard('user')->user();
            $company = MUserCompany::find($account->user_company_id);
            $account->company_name = $company->user_company_name;
        }

        if (!$account) {
            return $this->response(401, [], __('auth.failed'));
        }

        return $this->response(200, [
            'account' => new AccountResource($account),
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $token = request()->bearerToken();
        Auth::setToken($token)->invalidate();
        return $this->response(200, [], '');
    }

    /**
     * It updates the profile of a staff member
     *
     * @param Request request The request object.
     * @param id The id of the staff you want to update.
     */
    public function updateProfile(Request $request)
    {
        $authCurrent = $this->getAuthCurrent(["admin", "business", "accountant", "coordinate"]);
        if (!$authCurrent) {
            return $this->response(401, [], __('text.unauthorized'));
        }

        $id = $authCurrent->id;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:staffs,email,' . $id . ',id,deleted_at,NULL'],
            'password' => ['nullable', 'string', 'min: 6', 'max: 20']
        ]);

        $staff = Staff::find($id);

        if (!$staff) {
            return $this->response(404, [], __('text.resource_not_found'));
        }

        try {
            $password = $staff->password;
            if ($request->password) {
                $password = Hash::make($request->password);
            }

            $params = $request->all();
            $params['password'] = $password;
            unset($params['createdAt']);
            $staff->update($this->camelKeys($params));

            return $this->response(200, []);
        } catch (\Throwable $th) {
            return $this->response(422, [], __('text.error_occurred'));
        }
    }

    /**
     * Find Password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findPassword(Request $request)
    {
        try {
            $rules = [
                'mailaddr' => ['required', 'string', 'email', 'max:255'],
                'type' => ['string'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'mailaddr' => 'メールアドレス',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            if ($request->type == 'clientUser') {
                $account = MClientUser::where('mailaddr', $request->mailaddr)->first();
                $typeUrl = 'client';
            } else if ($request->type == 'sangyoi') {
                $account = MSangyoi::where('contact_mailaddr', $request->mailaddr)->first();
                $typeUrl = 'sangyoi';
            } else {
                $account = MUser::where('mailaddr', $request->mailaddr)->first();
                $typeUrl = 'user';
            }

            if (!$account) {
                return $this->response(404, [
                    'error' => true
                ], __('text.mail_not_exists'));
            }

            $randomToken = Str::random(32);

            // Update token reset password
            $account->token = $randomToken;
            $account->token_issued = Carbon::now();
            $account->save();

            $url = sprintf('%s/cp/%s/change-password/?type=%s&token=%s', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $typeUrl, $request->type, $randomToken);

            Mail::to($request->mailaddr)->send(new FindPassword([
                'type' => $request->type,
                'url' => $url,
                'tel' => env("ENV_TEL"),
                'hour' => env("ENV_HOUR")
            ]));

            return $this->response(200, [
                'token' => $randomToken
            ], __('text.send_mail_reset_password_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.send_mail_reset_password_failed'));
        }
    }

    /**
     * Reset Password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        try {
            $rules = [
                'type' => ['string'],
                'token' => ['required', 'string', 'max:32'],
                'password' => ['required', 'string', 'min: 6', 'max: 99'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'token' => 'トークン',
                'password' => 'パスワード',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            // Check type
            if ($request->type == 'clientUser') {
                $account = MClientUser::where('token', $request->token)->firstOrFail();
                $mailaddr = $account->mailaddr;
                $typeUrl = 'client';
            } else if ($request->type == 'sangyoi') {
                $account = MSangyoi::where('token', $request->token)->firstOrFail();
                $mailaddr = $account->contact_mailaddr;
                $typeUrl = 'sangyoi';
            } else {
                $account = MUser::where('token', $request->token)->firstOrFail();
                $mailaddr = $account->mailaddr;
                $typeUrl = 'user';
            }

            $endTimeToken = (new Carbon($account->token_issued))->addMinutes(30);
            $now = Carbon::now()->format('Y-m-d H:i:s');

            // Check end time token (+30 minutes)
            if ($endTimeToken->greaterThan($now)) {
                $account->password = Hash::make($request->password);
                $account->save();
            } else {
                return $this->response(422, [], __('text.token_invalid'));
            }

            $url = sprintf('%s/cp/%s/login/', env('FRONT_URL') ?: $_SERVER['FRONT_URL'], $typeUrl, $request->type);

            Mail::to($mailaddr)->send(new LoginEmail([
                'type' => $request->type,
                'url' => $url,
                'mail' => env("ENV_MAIL"),
                'tel' => env("ENV_TEL"),
                'hour' => env("ENV_HOUR")
            ]));

            return $this->response(200, [], __('text.update_password_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_password_failed'));
        }
    }

    public function testSendMail(Request $request)
    {
        // try {

        //     $url = sprintf('%s/cp/client/change-password?type=%s&token=%s', env('FRONT_URL', 'http://localhost:3000'), 'aaaaa', '111111');

        //     Mail::to($request->mailaddr)->send(new FindPassword('aaaaa', $url));

        //     return $this->response(200, [], __('text.send_mail_reset_password_succeed'));
        // } catch (\Exception $ex) {
        //     return $this->response(500, [
        //         'error' => $ex->getMessage()
        //     ], __('text.send_mail_reset_password_failed'));
        // }
    }
}
