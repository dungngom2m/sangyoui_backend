<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionnaireCollection;
use App\Models\MClient;
use App\Models\MQuestionnaire;
use App\Models\TCounselingReserveNotice;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Create a new QuestionnaireController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request) {
        try {
            $questionnairesLv1 = MQuestionnaire::select('question_lev1_no')->distinct()->get();
            $questionnaires = [];

            foreach ($questionnairesLv1 as $lv) {
                $query = MQuestionnaire::where('question_lev1_no', $lv->question_lev1_no)->orderBy('question_lev2_no', 'asc')->get();
                array_push($questionnaires, new QuestionnaireCollection($query));
            }

            $account = auth()->guard('code')->user();
            $client = MClient::find($account->client_id);

            return $this->response(200, [
                'questionnaires' => $questionnaires,
                'name' => [
                    'clientName' => $client->client_name ?? '',
                    'employeeName' => $account->name ?? ''
                ]
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }

    /**
     * Test insert questionnaire.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        try {
            $account = auth()->guard('code')->user();

            $questionnaire = new MQuestionnaire();
            $questionnaire->user_company_id = 2;
            $questionnaire->client_status = 0;
            $questionnaire->question_lev1_no = $request->questionLev1No;
            $questionnaire->question_lev2_no = $request->questionLev2No;
            $questionnaire->question_title = $request->questionTitle;
            $questionnaire->question_text = $request->questionText;
            $questionnaire->answer_text_1 = $request->answerText1 ?? null;
            $questionnaire->answer_text_2 = $request->answerText2 ?? null;
            $questionnaire->answer_text_3 = $request->answerText3 ?? null;
            $questionnaire->answer_text_4 = $request->answerText4 ?? null;
            $questionnaire->regist_id = $account->id;
            $questionnaire->update_id = $account->id;
            $questionnaire->save();

            return $this->response(200, [
                'questionnaire' => $questionnaire
            ], __('text.store_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed'));
        }
    }

    public function getName(Request $request) {
        try {
            $result = TCounselingReserveNotice::join('m_client_employee', function ($join) {
                                                        $join->on('m_client_employee.client_id', '=', 't_counseling_reserve_notice.client_id');
                                                        $join->on('m_client_employee.user_company_id', '=', 't_counseling_reserve_notice.user_company_id');
                                                        $join->on('m_client_employee.employee_number', '=', 't_counseling_reserve_notice.employee_id');
                                                        $join->whereNull('m_client_employee.deleted_at');
                                                    })
                                                    ->join('m_client', function ($join) {
                                                        $join->on('m_client.id', '=', 't_counseling_reserve_notice.client_id');
                                                        $join->whereNull('m_client.deleted_at');
                                                    })
                                                    ->where('t_counseling_reserve_notice.id', $request->id)
                                                    ->select(
                                                        'm_client_employee.name as employeeName',
                                                        'm_client.client_name as clientName',
                                                    )
                                                    ->first();

            return $this->response(200, [
                'name' => [
                    'clientName' => $result->clientName ?? '',
                    'employeeName' => $result->employeeName ?? ''
                ]
            ], __('text.list_succeed'));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.list_failed'));
        }
    }
}
