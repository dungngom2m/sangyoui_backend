<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $sumBasePrice = $this->sum_base_price ?? 0;
        $countEmployee = $this->count_employee ?? 0;
        $sum = $this->sum ?? 0;
        $sum2 = $this->sum2 ?? 0;

        $sumAll1 = (($sumBasePrice * $countEmployee) + $sum + $sum2) * 0.1;

        return [
            'clientCode' => $this->client_code ?? '',
            'clientName' => $this->client_name ?? '',
            'clientNameKana' => $this->client_name_kana ?? '',
            'countEmployee' => $countEmployee,
            'countHospital' => $this->count_hospital ?? 0,
            'countGeneral' => $this->count_general ?? 0,
            'countCounselingReserve' => $this->count_counseling_reserve ?? 0,
            'sumBasePrice' => ($sumBasePrice * $countEmployee) ?? '',
            'sum' => $sum,
            'sum2' => $sum2 ?? '',
            'sumAll1' => $sumAll1,
            'sumAll2' => ($sumBasePrice * $countEmployee) + $sum + $sum2 + $sumAll1,
        ];
    }
}
