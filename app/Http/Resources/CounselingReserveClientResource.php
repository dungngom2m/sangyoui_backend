<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientResource extends JsonResource
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
            'clientCode' => $this->client_code ?? '',
            'clientName' => $this->client_name ?? '',
            'countEmployee' => $this->count_employee ?? '',
            'countHospital' => $this->count_hospital ?? '',
            'countGeneral' => $this->count_general ?? '',
            'sum' => $this->sum ?? '',
        ];
    }
}
