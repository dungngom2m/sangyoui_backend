<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use App\Models\TCounselingReserve;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiPaymentNoticeResource extends JsonResource
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

        $reportUpdatedAt = '';
        if (isset($this->general_updated_at)) {
            $reportUpdatedAt = CommonHelper::formatDatetime($this->general_updated_at);
        } else if (isset($this->hospital_updated_at)) {
            $reportUpdatedAt = CommonHelper::formatDatetime($this->hospital_updated_at);
        }

        return [
            'id' => $this->id,
            'noticeId' => $this->notice_id,
            'clientName' => $this->client_name ?? '',
            'employeeName' => $this->employee_name ?? '',
            'reserveDate' => CommonHelper::formatDatetime($this->reserve_date) ?? '',
            'reserveTimeFrom' => $this->reserve_time_from ?? '',
            'reportUpdatedAt' => $reportUpdatedAt,
            'counselingType' => $counselingType ?? '',
            'price' => $this->price ?? 0,
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
