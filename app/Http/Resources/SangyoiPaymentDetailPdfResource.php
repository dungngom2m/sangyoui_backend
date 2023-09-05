<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiPaymentDetailPdfResource extends JsonResource
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
            'userCompanyName' => $this->user_company_name ?? '',
            'postNumber' => $this->post_number ?? 0,
            'todofuken' => $this->todofuken ?? 0,
            'shikucyoson' => $this->shikucyoson ?? '',
            'tatemono' => $this->tatemono ?? '',
            'heyabango' => $this->heyabango ?? '',
            'telNumber' => $this->tel_number ?? '',
            'sum' => $this->sum ?? ''
        ];
    }
}
