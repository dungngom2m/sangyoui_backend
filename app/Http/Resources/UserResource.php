<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name ?? '',
            'nameKana' => $this->name_kana ?? '',
            'mailaddr' => $this->mailaddr ?? '',
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
