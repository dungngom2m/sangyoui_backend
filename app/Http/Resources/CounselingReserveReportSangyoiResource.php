<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use App\Models\TCounselingReserve;
use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveReportSangyoiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $counselingTypeAr = TCounselingReserve::counselingType;
        $counselingType = '';

        foreach($counselingTypeAr as $item) {
            if ($this->counseling_type == $item['id']) {
                $counselingType = $item['label'];
                break;
            }
        }

        return [
            'id' => $this->id,
            'clientName' => $this->client_name ?? '',
            'employeeName' => $this->employee_name ?? '',
            'reserveDate' => CommonHelper::formatDatetime($this->reserve_date) ?? '',
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at) ?? '',
            'counselingType' => $counselingType,
            'price' => $this->price ?? '',
            'reportStatus' => $this->report_status ?? ''
        ];
    }
}
