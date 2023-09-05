<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAnswerResource extends JsonResource
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
            'questionTitle' => $this->question_title ?? '',
            'questionLev1No' => $this->question_lev1_no ?? '',
            'questionLev2No' => $this->question_lev2_no ?? '',
            'questionText' => $this->question_text ?? '',
            'answerText' => $this->answer_text ?? '',
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
