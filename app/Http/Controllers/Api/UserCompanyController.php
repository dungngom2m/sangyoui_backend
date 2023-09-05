<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCompanyResource;
use App\Models\MUserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserCompanyController extends Controller
{
    /**
     * Create a new UserCompanyController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Update employee.
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            $rules = [
                'userCompanyName' => ['string', 'max:100'],
                'userCompanyNameKana' => ['string', 'max:100'],
                'postNumber' => ['string', 'max:7'],
                'todofuken' => ['string', 'max:100'],
                'shikucyoson' => ['string', 'max:100'],
                'heyabango' => ['string', 'max:100'],
                'tatemono' => ['string', 'max:100'],
                'telNumber' => ['string', 'max:13'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'userCompanyName' => '企業名',
                'userCompanyNameKana' => '企業名ふりがな',
                'postNumber' => '郵便番号',
                'todofuken' => '都道府県',
                'shikucyoson' => '市区町村ほか',
                'heyabango' => '部屋番号',
                'tatemono' => '建物名',
                'telNumber' => '電話番号',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $account = auth()->guard('user')->user();

            $company = MUserCompany::findOrFail($account->user_company_id);
            $company->user_company_name = $request->userCompanyName;
            $company->user_company_name_kana = $request->userCompanyNameKana;
            $company->post_number = $request->postNumber;
            $company->todofuken = $request->todofuken;
            $company->shikucyoson = $request->shikucyoson;
            $company->heyabango = $request->heyabango;
            $company->tatemono = $request->tatemono;
            $company->tel_number = $request->telNumber;
            $company->update_id = $account->id;
            $company->save();

            return $this->response(200, [
                'company' => new UserCompanyResource($company)
            ], __('text.update_succeed', ['attribute' => 'アカウント設定']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.update_failed', ['attribute' => 'アカウント設定']));
        }
    }


    /**
     * Detail company.
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail()
    {
        try {
            $account = auth()->guard('user')->user();

            $company = MUserCompany::findOrFail($account->user_company_id);

            return $this->response(200, [
                'company' => new UserCompanyResource($company)
            ], __('text.show_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.show_failed'));
        }
    }
}
