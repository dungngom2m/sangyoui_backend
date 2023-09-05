<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientDetail2Collection extends JsonResource
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

        if ($this->resource) {
            foreach ($this->resource as $item) {
                $collectionResource[] = new CounselingReserveClientDetail2Resource($item);
            }
        }

        try {
            return $collectionResource;
        } catch (\Throwable $th) {
            return $collectionResource;
        }
    }
}
