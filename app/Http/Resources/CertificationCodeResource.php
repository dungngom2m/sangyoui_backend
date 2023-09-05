<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificationCodeResource extends JsonResource
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
            'smsNumber' => $this->sms_number ?? '',
            'certificationCode' => $this->certification_code ?? '',
            'certificationStatus' => $this->certification_status ?? 0,
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
