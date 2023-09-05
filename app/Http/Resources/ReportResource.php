<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'name' => $this->name ?? '',
            'overtime' => $this->overtime ?? '',
            'registDate' => CommonHelper::formatDatetime($this->registDate) ?? '',
            'updateDate' => CommonHelper::formatDatetime($this->updateDate) ?? '',
            'reserveDate' => CommonHelper::formatDatetime($this->reserveDate) ?? '',
            'reportUpdateDate' => CommonHelper::formatDatetime($this->reportUpdateDate) ?? '',
            'openFlg' => $this->openFlg ?? '',
            'implementationStatus' => $this->implementationStatus ?? '',
        ];
    }
}
