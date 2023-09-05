<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientDetailPdf2Resource extends JsonResource
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
            'count' => $this->count ?? '',
            'price' => $this->price ?? '',
            'price1' => $this->price_1 ?? '',
            'price2' => $this->price_2 ?? ''
        ];
    }
}
