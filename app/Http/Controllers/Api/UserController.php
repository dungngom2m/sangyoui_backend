<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Mail\RegistAccountUserEmail;
use App\Mail\RegistAccountUserPassword;
use App\Models\MUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $account;

    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('user')->user();
    }

    /**
     * Display a listing of user.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'nameKana':
                    $orderSortBy = 'name_kana';
                    break;
            }

            $list = MUser::select(
                    'id', 'name', 'name_kana', 'mailaddr', 'created_at', 'updated_at'
                )
                ->where('user_company_id', $this->account->user_company_id)
                ->where(function($query) use ($request) {
                    $query->where('name', 'LIKE', '%'.$request->keyword.'%')
                        ->orWhere('name_kana', 'LIKE', '%'.$request->keyword.'%')
                        ->orWhere('mailaddr', 'LIKE', '%'.$request->keyword.'%');
                })
                ->orderBy($orderSortBy, $request->orderBy)
                ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'userList' => new UserCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store user.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:100'],
                'nameKana' => ['required', 'string', 'max:100'],
                'mailAddr' => ['required', 'string', 'max:254'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'name' => '氏名',
                'nameKana' => '氏名ふりがな',
                'mailAddr' => 'メールアドレス',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $uniqueMail = MUser::where('mailaddr', $request->mailAddr)->first();

            if ($uniqueMail) {
                return $this->response(400, [
                    'error' => true
                ], __('validation.unique', ['attribute' => 'メールアドレス']));
            }

            $password = uniqid();
            $account = auth()->guard('user')->user();

            $user = new MUser();
            $user->name = $request->name;
            $user->name_kana = $request->nameKana;
            $user->mailaddr = $request->mailAddr;
            $user->user_company_id = $account->user_company_id;
            $user->password = Hash::make($password);
            $user->regist_id = $account->id;
            $user->update_id = $account->id;
            $user->save();

            $url = sprintf('%s/cp/user/login/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);

            Mail::to($user->mailaddr)->send(new RegistAccountUserEmail([
                'mailaddr' => $user->mailaddr,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'loginUrl' => $url
            ]));

            Mail::to($user->mailaddr)->send(new RegistAccountUserPassword([
                'password' => $password,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'loginUrl' => $url
            ]));

            return $this->response(200, [
                'user' => new UserResource($user)
            ], __('text.store_succeed', ['attribute' => 'ユーザ']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => 'ユーザ']));
        }
    }

    /**
     * Destroy user.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            MUser::findOrFail($id)->delete();

            return $this->response(200, [], __('text.delete_succeed', ['attribute' => 'ユーザ']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.delete_failed', ['attribute' => 'ユーザ']));
        }
    }
}
