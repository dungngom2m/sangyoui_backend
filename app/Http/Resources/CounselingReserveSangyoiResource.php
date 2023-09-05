<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CounselingReserveSangyoiResource extends JsonResource
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
            'clientName' => $this->client_name ?? '',
            'employeeName' => $this->employee_name ?? '',
            'reserveDate' => (new Carbon($this->reserve_date))->format('Y-m-d') ?? '',
            'reserveTimeFrom' => (new Carbon($this->reserve_time_from))->format('H:i') ?? '',
            'counselingType' => $this->counseling_type ?? '',
            'overtime' => $this->overtime ?? '',
            'smsNumber' => $this->sms_number ?? '',
            'implementationStatus' => $this->implementation_status ?? '',
            'empId' => $this->emp_id ?? '',
        ];
    }
}
