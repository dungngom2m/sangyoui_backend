<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'code' => $this->code ?? '',
            'phone' => $this->phone ?? '',
            'weight' => $this->weight ?? 0,
            'weightFormatted' => number_format($this->weight) ?? 0,
            'qrcode' => $this->qrcode ?? '',
            'shippingUnit' => $this->shippingUnit()->select('id', 'name')->withTrashed()->first(),
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
