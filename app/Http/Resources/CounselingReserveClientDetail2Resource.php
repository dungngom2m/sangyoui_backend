<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientDetail2Resource extends JsonResource
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
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'updateDateHosKi' => CommonHelper::formatDatetime($this->update_date_hos_ki) ?? '',
            'updateDateGenKi' => CommonHelper::formatDatetime($this->update_date_gen_ki) ?? '',
            'reserveDate' => CommonHelper::formatDatetime($this->reserve_date) ?? '',
            'updateDateHosRe' => CommonHelper::formatDatetime($this->update_date_hos_re) ?? '',
            'updateDateGenRe' => CommonHelper::formatDatetime($this->update_date_gen_re) ?? '',
            'implementationStatus' => $this->implementation_status ?? '',
            'clientStatus' => $this->client_status ?? '',
            'price' => $this->price ?? '',
        ];
    }
}
