<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientDetailPdf2Collection extends JsonResource
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
        $sum = 0;

        if ($this->resource) {
            foreach ($this->resource as $item) {
                $sum += $item->price * $item->count;
                $collectionResource[] = new CounselingReserveClientDetailPdf2Resource($item);
            }
        }

        try {
            $tax = $sum * 0.1;
            return [
                'data' => $collectionResource,
                'sum' => $sum,
                'tax' => $tax,
                'sum2' => $sum + $tax
            ];
        } catch (\Throwable $th) {
            return $collectionResource;
        }
    }
}
