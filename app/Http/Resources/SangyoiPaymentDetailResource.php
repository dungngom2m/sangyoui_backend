<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiPaymentDetailResource extends JsonResource
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
            'name' => $this->name ?? '',
            'contactTelnumber' => $this->contact_telnumber ?? '',
            'count' => $this->count ?? 0,
            'sum' => $this->sum ?? 0,
            'ginkoName' => $this->ginko_name ?? '',
            'kozaType' => $this->koza_type ?? '',
            'ginkoShitenName' => $this->ginko_shiten_name ?? '',
            'ginkoShitenNameKana' => $this->ginko_shiten_name_kana ?? '',
            'kozaNameKana' => $this->koza_name_kana ?? '',
            'kozaNumber' => $this->koza_number ?? ''
        ];
    }
}
