<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientEmployeeCollection;
use App\Http\Resources\ClientEmployeeResource;
use App\Models\MClientEmployee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientEmployeeController extends Controller
{
    private $account;
    /**
     * Create a new ClientEmployeeController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->account = auth()->guard('clientUser')->user();
    }

    /**
     * Display a listing of employee.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $orderSortBy = $request->orderSortBy;
            switch ($request->orderSortBy) {
                case 'employeeNumber':
                    $orderSortBy = 'employee_number';
                    break;
                case 'employeeType':
                    $orderSortBy = 'employee_type';
                    break;
                case 'managerName1':
                    $orderSortBy = 'manager_name_1';
                    break;
                case 'nyushaDate':
                    $orderSortBy = 'nyusha_date';
                    break;
                case 'smsNumber':
                    $orderSortBy = 'sms_number';
                    break;
                case 'mailAddr':
                    $orderSortBy = 'mailaddr';
                    break;
            }

            $list = MClientEmployee::where('m_client_employee.client_id', $this->account->client_id)
                                    ->where(function($query) use ($request) {
                                        $query->where('m_client_employee.name', 'LIKE', '%'.$request->keyword.'%')
                                            ->orWhere('m_client_employee.name_kana', 'LIKE', '%'.$request->keyword.'%')
                                            ->orWhere('m_client_employee.sms_number', 'LIKE', '%'.$request->keyword.'%');
                                    })
                                    ->orderBy('retirement_flg', 'asc')
                                    ->orderBy($orderSortBy, $request->orderBy)
                                    ->select('m_client_employee.*')
                                    ->paginate($request->itemsPerPage ?? 10);

            return $this->response(200, [
                'employeeList' => new ClientEmployeeCollection($list)
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Store employee.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $user = auth()->guard('clientUser')->user();

            $clientId = $user->client_id;
            $companyId = $user->user_company_id;
            $employeeNumber = $request->employeeNumber;
            $smsNumber = str_replace('-', '', $request->smsNumber);

            $rules = [
                'employeeNumber' => [
                    'required', 'string', 'max:5',
                    Rule::unique('m_client_employee', 'employee_number')->where(function ($query) use ($clientId, $companyId, $employeeNumber) {
                        return $query->where('client_id', $clientId)
                                    ->where('user_company_id', $companyId)
                                    ->where('employee_number', $employeeNumber)
                                    ->where('retirement_flg', 0);
                    })
                ],
                'name' => ['required', 'string', 'max:100'],
                'nameKana' => ['required', 'string', 'max:100'],
                'employeeType' => ['required', 'string', 'max:100'],
                'busho' => ['required', 'string', 'max:100'],
                'yakushoku' => ['required', 'string', 'max:100'],
                'jigyosho' => ['required', 'string', 'max:100'],
                'managers' => ['required', 'array', 'min:1'],
                'managers.*.id'  => ['string', 'max:100'],
                'managers.*.name'  => ['string', 'max:100'],
                'nyushaDate' => ['required', 'date_format:Y/m/d'],
                'sex' => ['required', 'string', 'max:1'],
                'smsNumber' => [
                    'required', 'string', 'max:13', 'regex:/^\d{3}-\d{4}-\d{4}$/'
                ],
                'mailAddr' => ['max:254'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'smsNumber.regex' => __('text.regex_sms_number')
            ], [
                'employeeNumber' => '社員番号',
                'name' => '氏名',
                'nameKana' => 'ふりがな',
                'employeeType' => '従業員区分',
                'busho' => '部署',
                'yakushoku' => '役職',
                'jigyosho' => '事業所',
                'managers.*.id'  => '上長ID',
                'managers.*.name'  => '上長名',
                'nyushaDate' => '入社年月日',
                'sex' => '性別',
                'smsNumber' => 'SMS用番号',
                'mailAddr' => 'メールアドレス',
                'filePath' => '健康診断結果ファイルパス',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $checkSmsUnique = MClientEmployee::where('sms_number', $smsNumber)->where('retirement_flg', 0)->first();

            if (isset($checkSmsUnique)) {
                return $this->response(422, [], __('validation.unique', ['attribute' => 'SMS用番号']));
            }

            $employee = new MClientEmployee();
            $employee->employee_number = $request->employeeNumber;
            $employee->name = $request->name;
            $employee->name_kana = $request->nameKana;
            $employee->employee_type = $request->employeeType;
            $employee->busho = $request->busho;
            $employee->yakushoku = $request->yakushoku;
            $employee->jigyosho = $request->jigyosho;
            $employee->manager_id_1 = $request->managers[0]['id'];
            $employee->manager_name_1 = $request->managers[0]['name'];
            $employee->manager_id_2 = $request->managers[1]['id'] ?? null;
            $employee->manager_name_2 = $request->managers[1]['name'] ?? null;
            $employee->manager_id_3 = $request->managers[2]['id'] ?? null;
            $employee->manager_name_3 = $request->managers[2]['name'] ?? null;
            $employee->manager_id_4 = $request->managers[3]['id'] ?? null;
            $employee->manager_name_4 = $request->managers[3]['name'] ?? null;
            $employee->manager_id_5 = $request->managers[4]['id'] ?? null;
            $employee->manager_name_5 = $request->managers[4]['name'] ?? null;
            $employee->nyusha_date = $request->nyushaDate;
            $employee->sex = $request->sex;
            $employee->sms_number = $smsNumber;
            $employee->mailaddr = $request->mailAddr;
            $employee->client_id = $user->client_id;
            $employee->user_company_id = $user->user_company_id;
            $employee->regist_id = $user->id;
            $employee->update_id = $user->id;

            $kenkoshindankekkaFilepath = json_decode($request->filePath);

            $employee->kenkoshindankekka_update_date = isset($kenkoshindankekkaFilepath) ? (Carbon::now())->format('Y-m-d') : null;
            $employee->kenkoshindankekka_filepath = isset($kenkoshindankekkaFilepath) ? $kenkoshindankekkaFilepath->key : null;
            $employee->save();

            return $this->response(200, [
                'employee' => new ClientEmployeeResource($employee)
            ], __('text.store_succeed', ['attribute' => '従業員']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => '従業員']));
        }
    }

    /**
     * Update employee.
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $user = auth()->guard('clientUser')->user();

            $clientId = $user->client_id;
            $companyId = $user->user_company_id;
            $employeeNumber = $request->employeeNumber;
            $smsNumber = str_replace('-', '', $request->smsNumber);

            $rules = [
                'employeeNumber' => [
                    'required', 'string', 'max:5',
                    Rule::unique('m_client_employee', 'employee_number')->where(function ($query) use ($clientId, $companyId, $employeeNumber) {
                        return $query->where('client_id', $clientId)
                                    ->where('user_company_id', $companyId)
                                    ->where('employee_number', $employeeNumber)
                                    ->where('retirement_flg', 0);
                    })->ignore($id)
                ],
                'name' => ['required', 'string', 'max:100'],
                'nameKana' => ['required', 'string', 'max:100'],
                'employeeType' => ['required', 'string', 'max:100'],
                'busho' => ['required', 'string', 'max:100'],
                'yakushoku' => ['required', 'string', 'max:100'],
                'jigyosho' => ['required', 'string', 'max:100'],
                'managers' => ['required', 'array', 'min:1'],
                'managers.*.id'  => ['string', 'max:100'],
                'managers.*.name'  => ['string', 'max:100'],
                'nyushaDate' => ['required', 'date_format:Y/m/d'],
                'sex' => ['required', 'string', 'max:1'],
                'smsNumber' => [
                    'required', 'string', 'max:13', 'regex:/^\d{3}-\d{4}-\d{4}$/'
                ],
                'mailAddr' => ['max:254'],
            ];

            $validator = Validator::make($request->all(), $rules, [
                'smsNumber.regex' => __('text.regex_sms_number')
            ], [
                'employeeNumber' => '社員番号',
                'name' => '氏名',
                'nameKana' => 'ふりがな',
                'employeeType' => '従業員区分',
                'busho' => '部署',
                'yakushoku' => '役職',
                'jigyosho' => '事業所',
                'managers.*.id'  => '上長ID',
                'managers.*.name'  => '上長名',
                'nyushaDate' => '入社年月日',
                'sex' => '性別',
                'smsNumber' => 'SMS用番号',
                'mailAddr' => 'メールアドレス',
                'filePath' => '健康診断結果ファイルパス',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $checkSmsUnique = MClientEmployee::where('sms_number', $smsNumber)->where('retirement_flg', 0)->where('id', '!=', $id)->first();

            if (isset($checkSmsUnique)) {
                return $this->response(422, [], __('validation.unique', ['attribute' => 'SMS用番号']));
            }

            $employee = MClientEmployee::findOrFail($id);
            $employee->employee_number = $request->employeeNumber;
            $employee->name = $request->name;
            $employee->name_kana = $request->nameKana;
            $employee->employee_type = $request->employeeType;
            $employee->busho = $request->busho;
            $employee->yakushoku = $request->yakushoku;
            $employee->jigyosho = $request->jigyosho;
            $employee->manager_id_1 = $request->managers[0]['id'];
            $employee->manager_name_1 = $request->managers[0]['name'];
            $employee->manager_id_2 = $request->managers[1]['id'] ?? null;
            $employee->manager_name_2 = $request->managers[1]['name'] ?? null;
            $employee->manager_id_3 = $request->managers[2]['id'] ?? null;
            $employee->manager_name_3 = $request->managers[2]['name'] ?? null;
            $employee->manager_id_4 = $request->managers[3]['id'] ?? null;
            $employee->manager_name_4 = $request->managers[3]['name'] ?? null;
            $employee->manager_id_5 = $request->managers[4]['id'] ?? null;
            $employee->manager_name_5 = $request->managers[4]['name'] ?? null;
            $employee->nyusha_date = $request->nyushaDate;
            $employee->sex = $request->sex;
            $employee->sms_number = $smsNumber;
            $employee->mailaddr = $request->mailAddr;
            $employee->client_id = $user->client_id;
            $employee->user_company_id = $user->user_company_id;
            $employee->update_id = $user->id;
            $employee->save();

            $kenkoshindankekkaFilepath = json_decode($request->filePath);

            if (isset($kenkoshindankekkaFilepath) && $employee->kenkoshindankekka_filepath) {
                Storage::disk('s3')->delete($employee->kenkoshindankekka_filepath);
            }

            $employee->kenkoshindankekka_update_date = isset($kenkoshindankekkaFilepath) ? (Carbon::now())->format('Y-m-d') : $employee->kenkoshindankekka_update_date;
            $employee->kenkoshindankekka_filepath = isset($kenkoshindankekkaFilepath) ? $kenkoshindankekkaFilepath->key : $employee->kenkoshindankekka_filepath;

            $employee->save();

            return $this->response(200, [
                'employee' => new ClientEmployeeResource($employee)
            ], __('text.update_succeed', ['attribute' => '従業員']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => '従業員']));
        }
    }

    /**
     * Destroy employee.
     *
     * @param Request The request object.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        try {
            $rules = [
                'retirementDate' => ['required', 'date_format:Y/m/d'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $employee = MClientEmployee::findOrFail($id);
            $employee->retirement_date = $request->retirementDate;
            $employee->retirement_flg = 1;
            $employee->save();
            // $employee->delete();

            return $this->response(200, [
                'employee' => new ClientEmployeeResource($employee)
            ], __('text.delete_succeed', ['attribute' => '従業員']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.delete_failed', ['attribute' => '従業員']));
        }
    }

    /**
     * Show employee
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $employee = MClientEmployee::findOrFail($id);

            return $this->response(200, [
                'employeeList' => new ClientEmployeeResource($employee)
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

    /**
     * Upload pdf file.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadPdf(Request $request)
    {
        try {
            $rules = [
                'pdfFile' => ['mimetypes:application/pdf', 'max:' . env('MB_PDF') ?: $_SERVER['MB_PDF']],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $now = Carbon::now();
            $path = '';
            if ($request->file('pdfFile')) {
                $path = Storage::disk('s3')->putFile("uploads/client-employee/{$now->year}/{$now->month}/{$now->day}", $request->file('pdfFile'));
            }

            return $this->response(200, [
                'path' => $path
            ], __('text.upload_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.upload_failed'));
        }
    }

    /**
     * Get pdf file.
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|string|null
     */
    public function getPdfFile($id)
    {
        try {
            $employee = MClientEmployee::find($id);

            if ($employee->kenkoshindankekka_filepath) {
                $content = Storage::disk('s3')->get($employee->kenkoshindankekka_filepath);

                if ($content) {
                    $header = [
                        'Content-Type' => 'application/pdf'
                    ];

                    return Response::make($content, 200, $header);
                }
            }

            return $this->response(200, [
                'result' => false
            ], __('text.show_failed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }

}
