<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionAnswerResource;
use App\Models\TKihoninfHospital;
use App\Models\TQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionAnswerController extends Controller
{
    /**
     * Create a new QuestionAnswerController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Store answer.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        try {
            $rules = [
                'clientStatus' => ['required', 'integer'],
                'questionTitle' => ['required', 'string', 'max:1000'],
                'questionLev1No' => ['required', 'integer'],
                'questionLev2No' => ['required', 'integer'],
                'questionText' => ['required', 'string', 'max:1000'],
                'answerText' => ['required', 'string', 'max:100'],
                'noticeId' => ['required', 'integer'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'clientStatus' => 'クライアントステータス',
                'questionTitle' => '設問タイトル',
                'questionLev1No' => '設問親No',
                'questionLev2No' => '設問子No',
                'questionText' => '質問内容',
                'answerText' => '回答内容',
                'noticeId' => '面談予約通知ID',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $account = auth()->guard('code')->user();

            $oldAnswer = TQuestionAnswer::where('user_company_id', $account->user_company_id)
                                        ->where('reserve_issue_id', $request->noticeId)
                                        ->where('client_status', $request->clientStatus)
                                        ->where('question_title', $request->questionTitle)
                                        ->where('question_lev1_no', $request->questionLev1No)
                                        ->where('question_lev2_no', $request->questionLev2No)
                                        ->where('question_text', $request->questionText)
                                        ->first();

            if (isset($oldAnswer)) {
                $oldAnswer->delete();
            }

            $answer = new TQuestionAnswer();
            $answer->user_company_id = $account->user_company_id;
            $answer->reserve_issue_id = $request->noticeId;
            $answer->client_status = $request->clientStatus;
            $answer->question_title = $request->questionTitle;
            $answer->question_lev1_no = $request->questionLev1No;
            $answer->question_lev2_no = $request->questionLev2No;
            $answer->question_text = $request->questionText;
            $answer->answer_score = $request->answerScore;
            $answer->answer_text = $request->answerText;
            $answer->regist_id = $account->id;
            $answer->update_id = $account->id;
            $answer->save();

            return $this->response(200, [
                'answer' => new QuestionAnswerResource($answer)
            ], __('text.store_succeed', ['attribute' => 'アンケート回答']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => 'アンケート回答']));
        }
    }

    public function destroy($id) {
        try {
            $quesAnswers = TQuestionAnswer::where('reserve_issue_id', $id)->get();
            $kihoHospital = TKihoninfHospital::where('reserve_issue_id', $id)->first();

            if ($kihoHospital) {
                $kihoHospital->delete();
            }

            foreach($quesAnswers as $item) {
                $item->delete();
            }

            return $this->response(200, [
                'result' => true
            ], __('text.delete_succeed', ['attribute' => 'アンケート回答']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.delete_failed', ['attribute' => 'アンケート回答']));
        }
    }
}
