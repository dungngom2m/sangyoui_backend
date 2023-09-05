<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiPaymentDetailPdf2Collection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $collectionResource = [];
        $sum3 = 0;
        $sum1Temp = 0;
        $sum2Temp = 0;

        if ($this->resource) {
            foreach ($this->resource as $item) {
                $sum3 += ($item->sum1 ?? 0) + ($item->sum2 ?? 0);
                $sum1Temp += ($item->sum1 ?? 0);
                $sum2Temp += ($item->sum2 ?? 0);
                $collectionResource[] = new SangyoiPaymentDetailPdf2Resource($item);
            }
        }

        try {
            return [
                'data' => $collectionResource,
                'sum3' => $sum3 * 0.1,
                'sum1Temp' => $sum1Temp,
                'sum2Temp' => $sum2Temp
            ];
        } catch (\Throwable $th) {
            return $collectionResource;
        }
    }
}
