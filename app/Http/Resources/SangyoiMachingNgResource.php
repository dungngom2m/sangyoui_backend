<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiMachingNgResource extends JsonResource
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
            'clientCode' => $this->client_code ?? '',
            'clientName' => $this->client_name ?? '',
            'managerName1' => $this->manager_name_1 ?? '',
            'telNumber' => $this->tel_number ?? '',
            'managerContactTelnumber1' => $this->manager_contact_telnumber_1 ?? '',
            'checked' => $this->checked,
        ];
    }
}
