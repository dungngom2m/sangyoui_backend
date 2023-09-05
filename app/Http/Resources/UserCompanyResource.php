<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCompanyResource extends JsonResource
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
            'userCompanyName' => $this->user_company_name ?? '',
            'userCompanyNameKana' => $this->user_company_name_kana ?? '',
            'postNumber' => $this->post_number ?? '',
            'todofuken' => $this->todofuken ?? '',
            'shikucyoson' => $this->shikucyoson ?? '',
            'heyabango' => $this->heyabango ?? '',
            'tatemono' => $this->tatemono ?? '',
            'telNumber' => $this->tel_number ?? '',
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
