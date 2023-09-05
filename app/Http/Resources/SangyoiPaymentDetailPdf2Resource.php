<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiPaymentDetailPdf2Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sum3 = ($this->sum1 ?? 0) + ($this->sum2 ?? 0);
        return [
            'clientName' => $this->client_name ?? '',
            'sum1' => $this->sum1 ?? 0,
            'sum2' => $this->sum2 ?? 0,
            'sum3' => $sum3 * 0.1,
        ];
    }
}
