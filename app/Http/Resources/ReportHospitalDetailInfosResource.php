<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ReportHospitalDetailInfosResource extends JsonResource
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
            'name' => $this->cli_name ?? $this->user_name ?? $this->sangyoi_name,
            'updatedAt' => (new Carbon($this->updated_at))->format('Y/m/d H:i') ?? '',
            'updateId' => $this->update_id ?? '',
            'id' => $this->id ?? ''
        ];
    }
}
