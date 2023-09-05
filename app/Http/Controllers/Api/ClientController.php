<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientCollection;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CounselingReserveClientCollection;
use App\Http\Resources\CounselingReserveClientDetail2Collection;
use App\Http\Resources\CounselingReserveClientDetail2Resource;
use App\Http\Resources\CounselingReserveClientDetailPdf2Collection;
use App\Http\Resources\CounselingReserveClientDetailPdfResource;
use App\Http\Resources\CounselingReserveClientDetailResource;
use App\Http\Resources\UserResource;
use App\Imports\ClientEmployeesImport;
use App\Imports\WorkingTimesImport;
use App\Mail\RegistAccountEmail;
use App\Mail\RegistAccountPassword;
use App\Models\MClient;
use App\Models\MClientUser;
use App\Models\MUser;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class ClientController extends Controller
{
    private const clientStatus = [
        [
            'label' => '病院・医院、',
            'id' => 0
        ],
        [
            'label' => 'その他企業',
            'id' => 1
        ],
    ];

    private $account;

    /**
     * Create a new ClientController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('user')->user();
    }

    /**
     * Display a listing of client.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'clientCode':
                    $orderSortBy = 'client_code';
                    break;
                case 'clientName':
                    $orderSortBy = 'client_name';
                    break;
                case 'managerName':
                    $orderSortBy = 'manager_name_1';
                    break;
                case 'createdAt':
                    $orderSortBy = 'created_at';
                    break;
                case 'telNumber':
                    $orderSortBy = 'tel_number';
                    break;
                case 'managerContactTelnumber':
                    $orderSortBy = 'manager_contact_telnumber_1';
                    break;
                default:
                    $orderSortBy = 'client_code';
            }

            $list = MClient::join('m_user_company', function ($join) {
                                $join->on('m_user_company.id', '=', 'm_client.user_company_id');
                                $join->whereNull('m_user_company.deleted_at');
                            })
                            ->join('m_user', function ($join) {
                                $join->on('m_user.user_company_id', '=', 'm_client.user_company_id');
                                $join->whereNull('m_user.deleted_at');
                            })
                            ->where('m_user.id', $this->account->id)
                            ->where(function($query) use ($request) {
                                $query->where('m_client.client_name', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.manager_name_1', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.manager_name_2', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.manager_name_3', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.manager_name_4', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.manager_name_5', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.tel_number', 'LIKE', '%'.$request->keyword.'%');
                            })
                            ->select('m_client.*')
                            ->orderBy($orderSortBy, $request->orderBy)
                            ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'clientList' => new ClientCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store client.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'clientCode' => ['required', 'string', 'max:5'],
                'clientStatus' => ['required', 'integer', 'max:1'],
                'clientName' => ['required', 'string', 'max:100'],
                'clientNameKana' => ['required', 'string', 'max:100'],
                'keiyakuDate' => ['required', 'date_format:Y/m/d'],
                'postNumber' => ['required', 'string', 'max:7'],
                'chiikiCd' => ['required', 'integer'],
                'todofuken' => ['required', 'string', 'max:100'],
                'chikucyoson' => ['required', 'string', 'max:100'],
                'tatemono' => ['max:100'],
                'heyabango' => ['max:100'],
                'telNumber' => ['required', 'string', 'max:13'],
                'managers' => ['required', 'array', 'min:1'],
                'managers.*.name'  => ['string', 'max:100'],
                'managers.*.nameKana'  => ['string', 'max:100'],
                'managers.*.mailAddr'  => ['string', 'max:254'],
                'managers.*.contactTelnumber'  => ['string', 'max:13'],
                'apiKey' => ['max:1000'],
                'overtimeBorder' => ['required', 'integer'],
                'basePriceFixed' => ['required', 'integer'],
                'basePriceParuse' => ['required', 'integer']
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'clientCode' => 'クライアントID',
                'clientStatus' => 'クライアントステータス',
                'clientName' => '企業名',
                'clientNameKana' => '企業名ふりがな',
                'keiyakuDate' => '契約日',
                'postNumber' => '郵便番号',
                'chiikiCd' => '地域コード',
                'todofuken' => '都道府県',
                'chikucyoson' => '市区町村ほか',
                'tatemono' => '建物名',
                'heyabango' => '部屋番号',
                'telNumber' => '電話番号',
                'managers.*.name'  => '管理者名',
                'managers.*.nameKana'  => '管理者名ふりがな',
                'managers.*.mailAddr'  => '管理者メールアドレス',
                'managers.*.contactTelnumber'  => '管理者連絡先電話番号',
                'apiKey' => 'APIキー',
                'overtimeBorder' => '面談通知残業時間閾値',
                'basePriceFixed' => '基本料金（固定）',
                'basePriceParuse' => '基本料金（従量）'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            DB::beginTransaction();

            $account = auth()->guard('user')->user();

            $client = new MClient();
            $client->client_code = $request->clientCode;
            $client->client_status = $request->clientStatus;
            $client->client_name = $request->clientName;
            $client->client_name_kana = $request->clientNameKana;
            $client->keiyaku_date = $request->keiyakuDate;
            $client->post_number = $request->postNumber;
            $client->chiiki_cd = $request->chiikiCd;
            $client->todofuken = $request->todofuken;
            $client->chikucyoson = $request->chikucyoson;
            $client->tatemono = $request->tatemono ?? null;
            $client->heyabango = $request->heyabango ?? null;
            $client->tel_number = $request->telNumber;

            $client->manager_name_1 = $request->managers[0]['name'];
            $client->manager_name_kana_1 = $request->managers[0]['nameKana'];
            $client->manager_mailaddr_1 = $request->managers[0]['mailAddr'];
            $client->manager_contact_telnumber_1 = $request->managers[0]['contactTelnumber'];

            $client->manager_name_2 = $request->managers[1]['name'] ?? null;
            $client->manager_name_kana_2 = $request->managers[1]['nameKana'] ?? null;
            $client->manager_mailaddr_2 = $request->managers[1]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_2 = $request->managers[1]['contactTelnumber'] ?? null;

            $client->manager_name_3 = $request->managers[2]['name'] ?? null;
            $client->manager_name_kana_3 = $request->managers[2]['nameKana'] ?? null;
            $client->manager_mailaddr_3 = $request->managers[2]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_3 = $request->managers[2]['contactTelnumber'] ?? null;

            $client->manager_name_4 = $request->managers[3]['name'] ?? null;
            $client->manager_name_kana_4 = $request->managers[3]['nameKana'] ?? null;
            $client->manager_mailaddr_4 = $request->managers[3]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_4 = $request->managers[3]['contactTelnumber'] ?? null;

            $client->manager_name_5 = $request->managers[4]['name'] ?? null;
            $client->manager_name_kana_5 = $request->managers[4]['nameKana'] ?? null;
            $client->manager_mailaddr_5 = $request->managers[4]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_5 = $request->managers[4]['contactTelnumber'] ?? null;

            $client->api_key = $request->apiKey ?? null;
            $client->overtime_border = $request->overtimeBorder;
            $client->base_price_fixed = $request->basePriceFixed;
            $client->base_price_paruse = $request->basePriceParuse;
            $client->user_company_id = $account->user_company_id;
            $client->regist_id = $account->id;
            $client->update_id = $account->id;
            $client->save();

            $excelFile = json_decode($request->excelPath);

            if (isset($excelFile)) {
                Excel::import(new ClientEmployeesImport($client->id, $client->user_company_id), $excelFile->key, "s3", \Maatwebsite\Excel\Excel::XLSX);
            }

            foreach($request->managers as $manager) {
                $clientUser = MClientUser::where('mailaddr', $manager['mailAddr'])->first();

                if (isset($clientUser)) {
                    $clientUser->name = $manager['name'];
                    $clientUser->name_kana = $manager['nameKana'];
                    $clientUser->save();
                } else {
                    $password = uniqid();
                    $clientUser = new MClientUser();
                    $clientUser->user_company_id = $account->user_company_id;
                    $clientUser->client_id = $client->id;
                    $clientUser->name = $manager['name'];
                    $clientUser->name_kana = $manager['nameKana'];
                    $clientUser->mailaddr = $manager['mailAddr'];
                    $clientUser->password = Hash::make($password);
                    $clientUser->regist_id = $account->id;
                    $clientUser->update_id = $account->id;
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
                }
            }

            DB::commit();

            return $this->response(200, [
                'client' => new ClientResource($client)
            ], __('text.store_succeed', ['attribute' => 'クライアント']));
        } catch (ValidationException $ex) {
            DB::rollBack();
            $failures = $ex->failures();
            foreach ($failures as $failure) {
                $error = __('text.row_error', ['row' => $failure->row()]) . $failure->errors()[0];
                return $this->response(400, [], $error);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => 'クライアント']));
        }
    }

    /**
     * Update client.
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'clientCode' => ['required', 'string', 'max:5'],
                'clientStatus' => ['required', 'integer', 'max:1'],
                'clientName' => ['required', 'string', 'max:100'],
                'clientNameKana' => ['required', 'string', 'max:100'],
                'keiyakuDate' => ['required', 'date_format:Y/m/d'],
                'postNumber' => ['required', 'string', 'max:7'],
                'chiikiCd' => ['required', 'integer'],
                'todofuken' => ['required', 'string', 'max:100'],
                'chikucyoson' => ['required', 'string', 'max:100'],
                'tatemono' => ['max:100'],
                'heyabango' => ['max:100'],
                'telNumber' => ['required', 'string', 'max:13'],
                'managers' => ['required', 'array', 'min:1'],
                'managers.*.name'  => ['string', 'max:100'],
                'managers.*.nameKana'  => ['string', 'max:100'],
                'managers.*.mailAddr'  => ['string', 'max:254'],
                'managers.*.contactTelnumber'  => ['string', 'max:13'],
                'apiKey' => ['max:1000'],
                'overtimeBorder' => ['required', 'integer'],
                'basePriceFixed' => ['required', 'integer'],
                'basePriceParuse' => ['required', 'integer']
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'clientCode' => 'クライアントID',
                'clientStatus' => 'クライアントステータス',
                'clientName' => '企業名',
                'clientNameKana' => '企業名ふりがな',
                'keiyakuDate' => '契約日',
                'postNumber' => '郵便番号',
                'chiikiCd' => '地域コード',
                'todofuken' => '都道府県',
                'chikucyoson' => '市区町村ほか',
                'tatemono' => '建物名',
                'heyabango' => '部屋番号',
                'telNumber' => '電話番号',
                'managers.*.name'  => '管理者名',
                'managers.*.nameKana'  => '管理者名ふりがな',
                'managers.*.mailAddr'  => '管理者メールアドレス',
                'managers.*.contactTelnumber'  => '管理者連絡先電話番号',
                'apiKey' => 'APIキー',
                'overtimeBorder' => '面談通知残業時間閾値',
                'basePriceFixed' => '基本料金（固定）',
                'basePriceParuse' => '基本料金（従量）'
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            DB::beginTransaction();

            $account = auth()->guard('user')->user();

            $client = MClient::findOrFail($id);
            $client->client_code = $request->clientCode;
            $client->client_status = $request->clientStatus;
            $client->client_name = $request->clientName;
            $client->client_name_kana = $request->clientNameKana;
            $client->keiyaku_date = $request->keiyakuDate;
            $client->post_number = $request->postNumber;
            $client->chiiki_cd = $request->chiikiCd;
            $client->todofuken = $request->todofuken;
            $client->chikucyoson = $request->chikucyoson;
            $client->tatemono = $request->tatemono ?? null;
            $client->heyabango = $request->heyabango ?? null;
            $client->tel_number = $request->telNumber;

            $client->manager_name_1 = $request->managers[0]['name'];
            $client->manager_name_kana_1 = $request->managers[0]['nameKana'];
            $client->manager_mailaddr_1 = $request->managers[0]['mailAddr'];
            $client->manager_contact_telnumber_1 = $request->managers[0]['contactTelnumber'];

            $client->manager_name_2 = $request->managers[1]['name'] ?? null;
            $client->manager_name_kana_2 = $request->managers[1]['nameKana'] ?? null;
            $client->manager_mailaddr_2 = $request->managers[1]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_2 = $request->managers[1]['contactTelnumber'] ?? null;

            $client->manager_name_3 = $request->managers[2]['name'] ?? null;
            $client->manager_name_kana_3 = $request->managers[2]['nameKana'] ?? null;
            $client->manager_mailaddr_3 = $request->managers[2]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_3 = $request->managers[2]['contactTelnumber'] ?? null;

            $client->manager_name_4 = $request->managers[3]['name'] ?? null;
            $client->manager_name_kana_4 = $request->managers[3]['nameKana'] ?? null;
            $client->manager_mailaddr_4 = $request->managers[3]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_4 = $request->managers[3]['contactTelnumber'] ?? null;

            $client->manager_name_5 = $request->managers[4]['name'] ?? null;
            $client->manager_name_kana_5 = $request->managers[4]['nameKana'] ?? null;
            $client->manager_mailaddr_5 = $request->managers[4]['mailAddr'] ?? null;
            $client->manager_contact_telnumber_5 = $request->managers[4]['contactTelnumber'] ?? null;

            $client->api_key = $request->apiKey ?? null;
            $client->overtime_border = $request->overtimeBorder;
            $client->base_price_fixed = $request->basePriceFixed;
            $client->base_price_paruse = $request->basePriceParuse;
            $client->update_id = $account->id;
            $client->save();

            $excelFile = json_decode($request->excelPath);

            if (isset($excelFile)) {
                Excel::import(new ClientEmployeesImport($client->id, $client->user_company_id, false, 'update'), $excelFile->key, "s3", \Maatwebsite\Excel\Excel::XLSX);
            }

            // if ($request->excelPathTime) {
            //     Excel::import(
            //         new WorkingTimesImport($client->id, $client->user_company_id, $request->yearWorkingTime, $request->monthWorkingTime),
            //         $request->excelPathTime,
            //         "s3",
            //         \Maatwebsite\Excel\Excel::XLSX
            //     );
            // }

            // if ($request->excelPathTimeClone) {
            //     Excel::import(
            //         new WorkingTimesImport($client->id, $client->user_company_id, $request->yearWorkingTimeClone, $request->monthWorkingTimeClone),
            //         $request->excelPathTimeClone,
            //         "s3",
            //         \Maatwebsite\Excel\Excel::XLSX
            //     );
            // }

            foreach($request->managers as $manager) {
                $clientUser = MClientUser::where('mailaddr', $manager['mailAddr'])->first();

                if (isset($clientUser)) {
                    $clientUser->name = $manager['name'];
                    $clientUser->name_kana = $manager['nameKana'];
                    $clientUser->save();
                } else {
                    $password = uniqid();
                    $clientUser = new MClientUser();
                    $clientUser->user_company_id = $account->user_company_id;
                    $clientUser->client_id = $client->id;
                    $clientUser->name = $manager['name'];
                    $clientUser->name_kana = $manager['nameKana'];
                    $clientUser->mailaddr = $manager['mailAddr'];
                    $clientUser->password = Hash::make($password);
                    $clientUser->regist_id = $account->id;
                    $clientUser->update_id = $account->id;
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
                }
            }

            DB::commit();

            return $this->response(200, [
                'client' => new ClientResource($client)
            ], __('text.update_succeed', ['attribute' => 'クライアント']));
        } catch (ValidationException $ex) {
            $failures = $ex->failures();
            foreach ($failures as $failure) {
                $error = __('text.row_error', ['row' => $failure->row()]) . $failure->errors()[0];
                return $this->response(400, [], $error);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => 'クライアント']));
        }
    }

    /**
     * Get select, radio option.
     * @return \Illuminate\Http\JsonResponse
     */
    public function option() {
        try {
            $option = [
                'chiikiCd' => parent::chiikiCd,
            ];

            return $this->response(200, [
                'option' => $option,
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Show client
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        try {
            $client = MClient::findOrFail($id);

            return $this->response(200, [
                'client' => new ClientResource($client)
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Download excel.
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadExcel() {
        try {
            if (Storage::disk("s3")->exists("downloads/社員データ一括取込.xlsx")) return Storage::disk("s3")->download("downloads/社員データ一括取込.xlsx");
            return $this->response(200, [], __('text.download_failed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.download_failed'));
        }
    }

    /**
     * Download working time excel.
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadWTExcelClone() {
        try {
            if (Storage::disk("s3")->exists("downloads/残業時間超過社員データ取込.xlsx")) return Storage::disk("s3")->download("downloads/残業時間超過社員データ取込.xlsx");
            return $this->response(200, [], __('text.download_failed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.download_failed'));
        }
    }

    /**
     * Download working time excel.
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadWTExcel() {
        try {
            if (Storage::disk("s3")->exists("downloads/勤怠データフォーマット.xlsx")) return Storage::disk("s3")->download("downloads/勤怠データフォーマット.xlsx");
            return $this->response(200, [], __('text.download_failed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.download_failed'));
        }
    }

    /**
     * Upload excel.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadExcel(Request $request) {
        try {
            DB::beginTransaction();
            $now = Carbon::now();
            $path = '';

            $excelFile = json_decode($request->excelFile);
            if (isset($excelFile)) {
                $path = $excelFile->key;

                if ($path) {
                    Excel::import(new ClientEmployeesImport($request->id, $request->userCompanyId, true, $request->type), $path, "s3", \Maatwebsite\Excel\Excel::XLSX);
                }
            }

            DB::rollBack();
            return $this->response(200, [
                'path' => $path
            ], __('text.upload_succeed'));
        } catch (ValidationException $ex) {
            DB::rollBack();
            $failures = $ex->failures();
            foreach ($failures as $failure) {
                $error = __('text.row_error', ['row' => $failure->row()]) . $failure->errors()[0];
                return $this->response(400, [], $error);
            }
        } catch (ErrorException $ex) {
            DB::rollBack();
            return $this->response(400, [], $ex->getMessage());
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.upload_failed'));
        }
    }

    /**
     * Upload excel.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadWTExcel(Request $request) {
        try {
            DB::beginTransaction();
            $now = Carbon::now();
            $path = '';

            $excelFile = json_decode($request->excelFile);
            if (isset($excelFile)) {
                $path = $excelFile->key;

                if ($path) {
                    $client = MClient::find($request->id);

                    Excel::import(
                        new WorkingTimesImport($client->id, $client->user_company_id, $request->year, $request->month),
                        $path,
                        "s3",
                        \Maatwebsite\Excel\Excel::XLSX
                    );
                }
            }

            DB::commit();
            return $this->response(200, [
                'path' => $path
            ], __('text.upload_succeed'));
        } catch (ValidationException $ex) {
            DB::rollBack();
            $failures = $ex->failures();
            foreach ($failures as $failure) {
                $error = __('text.row_error', ['row' => $failure->row()]) . $failure->errors()[0];
                return $this->response(400, [], $error);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.upload_failed'));
        }
    }

    /**
     * Upload excel.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadWTExcelClone(Request $request) {
        try {
            DB::beginTransaction();
            $now = Carbon::now();
            $path = '';

            $excelFile = json_decode($request->excelFile);
            if (isset($excelFile)) {
                $path = $excelFile->key;

                if ($path) {
                    $client = MClient::find($request->id);

                    Excel::import(
                        new WorkingTimesImport($client->id, $client->user_company_id, $request->year, $request->month),
                        $path,
                        "s3",
                        \Maatwebsite\Excel\Excel::XLSX
                    );
                }
            }

            DB::commit();
            return $this->response(200, [
                'path' => $path
            ], __('text.upload_succeed'));
        } catch (ValidationException $ex) {
            DB::rollBack();
            $failures = $ex->failures();
            foreach ($failures as $failure) {
                $error = __('text.row_error', ['row' => $failure->row()]) . $failure->errors()[0];
                return $this->response(400, [], $error);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.upload_failed'));
        }
    }

    /**
     * Counseling reserve list.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function counselingReserveIndex(Request $request) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'clientCode':
                    $orderSortBy = 'm_client.client_code';
                    break;
                case 'clientName':
                    $orderSortBy = 'm_client.client_name';
                    break;
                case 'countEmployee':
                    $orderSortBy = 'count_employee';
                    break;
                case 'countHospital':
                    $orderSortBy = 'count_hospital';
                    break;
                case 'countGeneral':
                    $orderSortBy = 'count_general';
                    break;
                case 'sum':
                    $orderSortBy = 'sum';
                    break;
                default:
                    $orderSortBy = 'm_client.client_code';
            }

            $list = MClient::join('m_client_employee', function ($join) {
                                $join->on('m_client_employee.user_company_id', '=', 'm_client.user_company_id');
                                $join->on('m_client_employee.client_id', '=', 'm_client.id');
                                $join->whereNull('m_client_employee.deleted_at');
                            })
                            ->join('t_counseling_reserve_notice', function ($join) {
                                $join->on('t_counseling_reserve_notice.client_id', '=', 'm_client_employee.client_id');
                                $join->on('t_counseling_reserve_notice.user_company_id', '=', 'm_client_employee.user_company_id');
                                $join->on('t_counseling_reserve_notice.employee_id', '=', 'm_client_employee.employee_number');
                                $join->whereNull('t_counseling_reserve_notice.deleted_at');
                            })
                            ->join('t_counseling_reserve', function ($join) {
                                $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_counseling_reserve.deleted_at');
                            })
                            ->leftJoin('t_report_hospital', function ($join) {
                                $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_report_hospital.deleted_at');
                            })
                            ->leftJoin('t_report_general', function ($join) {
                                $join->on('t_report_general.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_report_general.deleted_at');
                            })
                            ->join('m_user_company', function ($join) {
                                $join->on('m_user_company.id', '=', 'm_client.user_company_id');
                                $join->whereNull('m_user_company.deleted_at');
                            })
                            ->join('m_user', function ($join) {
                                $join->on('m_user.user_company_id', '=', 'm_client.user_company_id');
                                $join->whereNull('m_user.deleted_at');
                            })
                            ->where('m_user.id', $this->account->id)
                            ->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                            ->where(function ($query) use ($request) {
                                $query->where('m_client.client_code', 'LIKE', '%'.$request->keyword.'%')
                                    ->orWhere('m_client.client_name', 'LIKE', '%'.$request->keyword.'%');
                            })
                            ->select(
                                'm_client.id as id',
                                'm_client.client_code as client_code',
                                'm_client.client_name as client_name',
                                DB::raw("COUNT(DISTINCT m_client_employee.id) as count_employee"),
                                DB::raw("COUNT(DISTINCT t_report_hospital.id) as count_hospital"),
                                DB::raw("COUNT(DISTINCT t_report_general.id) as count_general"),
                                DB::raw('SUM(t_counseling_reserve.price) AS sum')
                            )
                            ->orderBy($orderSortBy, $request->orderBy)
                            ->groupBy(
                                'm_client.id',
                                'm_client.client_code',
                                'm_client.client_name'
                            )
                            ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'clients' => new CounselingReserveClientCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Report list.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function counselingReserveDetail(Request $request, $id) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $client = MClient::join('m_client_employee', function ($join) {
                                $join->on('m_client_employee.user_company_id', '=', 'm_client.user_company_id');
                                $join->on('m_client_employee.client_id', '=', 'm_client.id');
                                $join->whereNull('m_client_employee.deleted_at');
                            })
                            ->join('t_counseling_reserve_notice', function ($join) {
                                $join->on('t_counseling_reserve_notice.client_id', '=', 'm_client_employee.client_id');
                                $join->on('t_counseling_reserve_notice.user_company_id', '=', 'm_client_employee.user_company_id');
                                $join->on('t_counseling_reserve_notice.employee_id', '=', 'm_client_employee.employee_number');
                                $join->whereNull('t_counseling_reserve_notice.deleted_at');
                            })
                            ->leftJoin('t_counseling_reserve', function ($join) {
                                $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_counseling_reserve.deleted_at');
                            })
                            ->leftJoin('t_report_hospital', function ($join) {
                                $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_report_hospital.deleted_at');
                            })
                            ->leftJoin('t_report_general', function ($join) {
                                $join->on('t_report_general.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_report_general.deleted_at');
                            })
                            ->select(
                                'm_client.client_code as client_code',
                                'm_client.client_name as client_name',
                                'm_client.client_name_kana as client_name_kana',
                                DB::raw("COUNT(DISTINCT m_client_employee.id) as count_employee"),
                                DB::raw("COUNT(DISTINCT t_report_hospital.id) as count_hospital"),
                                DB::raw("COUNT(DISTINCT t_report_general.id) as count_general"),
                                DB::raw("COUNT(DISTINCT CASE
                                    WHEN t_counseling_reserve.reserve_status = 2
                                        AND t_counseling_reserve.cancel_person_type = 0
                                        AND t_counseling_reserve.reserve_date <= t_counseling_reserve.cancel_date
                                    THEN t_counseling_reserve.id ELSE NULL END) as count_counseling_reserve"
                                ),
                                DB::raw('SUM(CASE WHEN t_counseling_reserve.reserve_status = 0 OR t_counseling_reserve.reserve_status = 1 THEN t_counseling_reserve.price ELSE 0 END) AS sum'),
                                DB::raw('SUM(CASE
                                    WHEN t_counseling_reserve.reserve_status = 2
                                        AND t_counseling_reserve.cancel_person_type = 0
                                        AND t_counseling_reserve.reserve_date <= t_counseling_reserve.cancel_date
                                    THEN t_counseling_reserve.price ELSE 0 END) AS sum2'),
                                DB::raw('SUM(DISTINCT (m_client.base_price_fixed + m_client.base_price_paruse)) AS sum_base_price'),
                            )
                            ->where('m_client.id', $id)
                            ->where(function ($query) use ($firstDate, $endDate) {
                                $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                    ->orWhereBetween('t_report_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                    ->orWhereBetween('t_counseling_reserve_notice.target_month', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                            })
                            ->groupBy(
                                'm_client.id',
                                'm_client.client_code',
                                'm_client.client_name',
                                'm_client.client_name_kana'
                            )
                            ->first();

            $notices = MClient::join('m_client_employee', function ($join) {
                                    $join->on('m_client_employee.user_company_id', '=', 'm_client.user_company_id');
                                    $join->on('m_client_employee.client_id', '=', 'm_client.id');
                                    $join->whereNull('m_client_employee.deleted_at');
                                })
                                ->join('t_counseling_reserve_notice', function ($join) {
                                    $join->on('t_counseling_reserve_notice.client_id', '=', 'm_client_employee.client_id');
                                    $join->on('t_counseling_reserve_notice.user_company_id', '=', 'm_client_employee.user_company_id');
                                    $join->on('t_counseling_reserve_notice.employee_id', '=', 'm_client_employee.employee_number');
                                    $join->whereNull('t_counseling_reserve_notice.deleted_at');
                                })
                                ->leftJoin('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->leftJoin('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->leftJoin('m_sangyoi', function ($join) {
                                    $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                    $join->whereNull('m_sangyoi.deleted_at');
                                })
                                ->leftJoin('t_report_hospital', function ($join) {
                                    $join->on('t_report_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_report_hospital.deleted_at');
                                })
                                ->leftJoin('t_report_general', function ($join) {
                                    $join->on('t_report_general.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_report_general.deleted_at');
                                })
                                ->leftJoin('t_kihoninf_hospital', function ($join) {
                                    $join->on('t_kihoninf_hospital.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_kihoninf_hospital.deleted_at');
                                })
                                ->leftJoin('t_kihoninf_general', function ($join) {
                                    $join->on('t_kihoninf_general.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_kihoninf_general.deleted_at');
                                })
                                ->select(
                                    't_counseling_reserve_notice.id as id',
                                    'm_sangyoi.name as name',
                                    't_kihoninf_hospital.updated_at as update_date_hos_ki',
                                    't_kihoninf_general.updated_at as update_date_gen_ki',
                                    't_counseling_reserve.reserve_date as reserve_date',
                                    't_report_hospital.updated_at as update_date_hos_re',
                                    't_report_general.updated_at as update_date_gen_re',
                                    't_counseling_reserve_notice.implementation_status as implementation_status',
                                    't_counseling_reserve_notice.target_month as target_month',
                                    'm_client.client_status as client_status',
                                    't_counseling_reserve.price as price',
                                    't_counseling_reserve.reserve_status as reserve_status'
                                )
                                ->where('m_client.id', $id)
                                ->where(function ($query) use ($firstDate, $endDate) {
                                    $query->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                        ->orWhereBetween('t_kihoninf_hospital.updated_at', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
                                })
                                ->when('t_report_hospital.updated_at IS NULL', function ($query) use ($firstDate, $endDate) {
                                    return $query->orWhereBetween('t_counseling_reserve_notice.target_month', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
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
                                ->orderBy('t_counseling_reserve_notice.id', 'DESC')
                                ->orderBy('t_counseling_reserve.reserve_date', 'DESC')
                                ->get();


            $notices = $notices->groupBy('id')->map(function ($item) {
                return $item;
            });

            // Group by reserve_status (child collection)
            $collection = collect();
            foreach($notices as $notice) {
                $notice = $notice->groupBy('reserve_status')->map(function ($item) {
                    return $item->first();
                });
                foreach($notice as $val) {
                    $collection->push($val);
                }
            }

            // return $notices;

            return $this->response(200, [
                'client' => new CounselingReserveClientDetailResource($client),
                'notices' => new CounselingReserveClientDetail2Collection($collection),
                'statusOption' => parent::implementationStatus,
                'clientStatusOption' => self::clientStatus
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Report detail pdf.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function counselingReserveDetailScanPdf(Request $request, $id) {
        try {
            $firstDate = Carbon::create($request->reserveDate);
            $endDay = $firstDate->daysInMonth;
            $endDate = Carbon::create($request->reserveDate . '-' . $endDay);

            $now = Carbon::create($request->reserveDate);
            $nextMonth = $now->copy()->addMonth();

            $client = MClient::join('m_client_employee', function ($join) {
                                $join->on('m_client_employee.user_company_id', '=', 'm_client.user_company_id');
                                $join->on('m_client_employee.client_id', '=', 'm_client.id');
                                $join->whereNull('m_client_employee.deleted_at');
                            })
                            ->join('t_counseling_reserve_notice', function ($join) {
                                $join->on('t_counseling_reserve_notice.client_id', '=', 'm_client_employee.client_id');
                                $join->on('t_counseling_reserve_notice.user_company_id', '=', 'm_client_employee.user_company_id');
                                $join->on('t_counseling_reserve_notice.employee_id', '=', 'm_client_employee.employee_number');
                                $join->whereNull('t_counseling_reserve_notice.deleted_at');
                            })
                            ->join('t_counseling_reserve', function ($join) {
                                $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                $join->whereNull('t_counseling_reserve.deleted_at');
                            })
                            ->join('m_user_company', function ($join) {
                                $join->on('m_user_company.id', '=', 'm_client.user_company_id');
                                $join->whereNull('m_user_company.deleted_at');
                            })
                            ->select(
                                'm_client.id as id',
                                'm_client.client_name as client_name',
                                DB::raw('SUM(t_counseling_reserve.price) AS sum'),
                                'm_user_company.id as com_id',
                                'm_user_company.user_company_name as user_company_name',
                                'm_user_company.post_number as post_number',
                                'm_user_company.todofuken as todofuken',
                                'm_user_company.shikucyoson as shikucyoson',
                                'm_user_company.tatemono as tatemono',
                                'm_user_company.heyabango as heyabango',
                                'm_user_company.tel_number as tel_number',
                                'm_user_company.fax_number as fax_number',
                                'm_user_company.invoice_number as invoice_number',
                                'm_user_company.seikyu_tantosha as seikyu_tantosha',
                            )
                            ->where('m_client.id', $id)
                            ->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                            ->groupBy('m_client.id', 'm_user_company.id')
                            ->first();

            $reserves = MClient::join('m_client_employee', function ($join) {
                                    $join->on('m_client_employee.user_company_id', '=', 'm_client.user_company_id');
                                    $join->on('m_client_employee.client_id', '=', 'm_client.id');
                                    $join->whereNull('m_client_employee.deleted_at');
                                })
                                ->join('t_counseling_reserve_notice', function ($join) {
                                    $join->on('t_counseling_reserve_notice.client_id', '=', 'm_client_employee.client_id');
                                    $join->on('t_counseling_reserve_notice.user_company_id', '=', 'm_client_employee.user_company_id');
                                    $join->on('t_counseling_reserve_notice.employee_id', '=', 'm_client_employee.employee_number');
                                    $join->whereNull('t_counseling_reserve_notice.deleted_at');
                                })
                                ->join('t_counseling_reserve', function ($join) {
                                    $join->on('t_counseling_reserve.reserve_issue_id', '=', 't_counseling_reserve_notice.id');
                                    $join->whereNull('t_counseling_reserve.deleted_at');
                                })
                                ->leftJoin('t_sangyoi_schedule', function ($join) {
                                    $join->on('t_sangyoi_schedule.id', '=', 't_counseling_reserve.sangyoi_schedule_id');
                                    $join->whereNull('t_sangyoi_schedule.deleted_at');
                                })
                                ->leftJoin('m_sangyoi', function ($join) {
                                    $join->on('m_sangyoi.id', '=', 't_sangyoi_schedule.doctor_id');
                                    $join->whereNull('m_sangyoi.deleted_at');
                                })
                                ->select(
                                    // DB::raw('COUNT(t_counseling_reserve.id) AS count'),
                                    DB::raw("COUNT(DISTINCT CASE
                                        WHEN t_counseling_reserve.reserve_status = 0 OR
                                            t_counseling_reserve.reserve_status = 1 OR
                                            (t_counseling_reserve.reserve_status = 2
                                            AND t_counseling_reserve.cancel_person_type = 0
                                            AND t_counseling_reserve.reserve_date <= t_counseling_reserve.cancel_date)
                                        THEN t_counseling_reserve.id ELSE NULL END) as count"
                                    ),
                                    't_counseling_reserve.price as price',
                                    'm_sangyoi.id as id',
                                    'm_sangyoi.price_1 as price_1',
                                    'm_sangyoi.price_2 as price_2',
                                )
                                ->groupBy('t_counseling_reserve.price', 'm_sangyoi.id')
                                ->where('m_client.id', $id)
                                ->whereBetween('t_counseling_reserve.reserve_date', [$firstDate->format('Y-m-d'), $endDate->format('Y-m-d')])
                                ->get();

            return $this->response(200, [
                'date' => [
                    'first' => $now->endOfMonth()->format('Y年m月d日'),
                    'second' => $nextMonth->endOfMonth()->format('Y年m月d日')
                ],
                'client' => new CounselingReserveClientDetailPdfResource($client),
                'reserves' => new CounselingReserveClientDetailPdf2Collection($reserves)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }
}
