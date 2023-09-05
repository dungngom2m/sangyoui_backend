<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Api\CounselingReserveNoticeController;
use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveNoticeResource extends JsonResource
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
            'reserveId' => $this->reserve_id ?? '',
            'name' => $this->name ?? '',
            'clientName' => $this->client_name ?? '',
            'sangyoiName' => $this->sangyoi_name ?? '',
            'implementationStatus' => $this->implementation_status ?? '',
            'hosUpdateDate' => CommonHelper::formatDatetime($this->hos_update_date) ?? '',
            // 'genUpdateDate' => $this->gen_update_date ?? '',
        ];
    }
}
