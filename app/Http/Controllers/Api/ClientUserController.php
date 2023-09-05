<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientUserCollection;
use App\Http\Resources\ClientUserResource;
use App\Mail\RegistAccountEmail;
use App\Mail\RegistAccountPassword;
use App\Models\MClient;
use App\Models\MClientUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ClientUserController extends Controller
{
    private $account;
    /**
     * Create a new ClientUserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('clientUser')->user();
    }

    /**
     * Display a listing of client user.
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

            $list = MClientUser::select(
                    'id', 'name', 'name_kana', 'mailaddr', 'created_at', 'updated_at'
                )
                ->where('client_id', $this->account->client_id)
                ->where(function($query) use ($request) {
                    $query->where('name', 'LIKE', '%'.$request->keyword.'%')
                        ->orWhere('name_kana', 'LIKE', '%'.$request->keyword.'%')
                        ->orWhere('mailaddr', 'LIKE', '%'.$request->keyword.'%');
                })
                ->orderBy($orderSortBy, $request->orderBy)
                ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'clientUserList' => new ClientUserCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    public static function checkAdmin($mailaddr) {
        $clientUser = MClient::where('manager_mailaddr_1', $mailaddr)
                            ->orWhere('manager_mailaddr_2', $mailaddr)
                            ->orWhere('manager_mailaddr_3', $mailaddr)
                            ->orWhere('manager_mailaddr_4', $mailaddr)
                            ->orWhere('manager_mailaddr_5', $mailaddr)
                            ->first();

        return isset($clientUser) ? true : false;
    }

    /**
     * Store client user.
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
                'nameKana' => 'ふりがな',
                'mailAddr' => 'メールアドレス',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $user = auth()->guard('clientUser')->user();

            $uniqueMail = MClientUser::where('user_company_id', $user->user_company_id)
                                    ->where('client_id', $user->client_id)
                                    ->where('mailaddr', $request->mailAddr)
                                    ->first();

            if ($uniqueMail) {
                return $this->response(400, [
                    'error' => true
                ], __('validation.unique', ['attribute' => 'メールアドレス']));
            }

            $password = uniqid();

            $clientUser = new MClientUser();
            $clientUser->name = $request->name;
            $clientUser->name_kana = $request->nameKana;
            $clientUser->mailaddr = $request->mailAddr;
            $clientUser->client_id = $user->client_id;
            $clientUser->user_company_id = $user->user_company_id;
            $clientUser->password = Hash::make($password);
            $clientUser->regist_id = $user->id;
            $clientUser->update_id = $user->id;
            $clientUser->save();

            $url = sprintf('%s/cp/client/login/', env('FRONT_URL') ?: $_SERVER['FRONT_URL']);

            Mail::to($clientUser->mailaddr)->send(new RegistAccountEmail([
                'mailaddr' => $clientUser->mailaddr,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'loginUrl' => $url
            ]));

            Mail::to($clientUser->mailaddr)->send(new RegistAccountPassword([
                'password' => $password,
                'tel' => env('ENV_TEL') ?: $_SERVER['ENV_TEL'],
                'hour' => env('ENV_HOUR') ?: $_SERVER['ENV_HOUR'],
                'loginUrl' => $url
            ]));

            return $this->response(200, [
                'clientUser' => new ClientUserResource($clientUser)
            ], __('text.store_succeed', ['attribute' => 'ユーザ']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => 'ユーザ']));
        }
    }

    /**
     * Destroy client user.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            MClientUser::findOrFail($id)->delete();

            return $this->response(200, [], __('text.delete_succeed', ['attribute' => 'ユーザ']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.delete_failed', ['attribute' => 'ユーザ']));
        }
    }
}
