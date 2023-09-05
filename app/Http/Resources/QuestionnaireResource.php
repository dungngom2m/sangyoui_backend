<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionnaireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'questionLev1No' => $this->question_lev1_no ?? '',
            'questionLev2No' => $this->question_lev2_no ?? '',
            'questionTitle' => $this->question_title ?? '',
            'questionText' => $this->question_text ?? '',
            'answerText1' => $this->answer_text_1 ?? '',
            'answerText2' => $this->answer_text_2 ?? '',
            'answerText3' => $this->answer_text_3 ?? '',
            'answerText4' => $this->answer_text_4 ?? '',
            'answerScore1' => $this->answer_score_1 ?? '',
            'answerScore2' => $this->answer_score_2 ?? '',
            'answerScore3' => $this->answer_score_3 ?? '',
            'answerScore4' => $this->answer_score_4 ?? '',
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
