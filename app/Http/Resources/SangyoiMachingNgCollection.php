<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiMachingNgCollection extends JsonResource
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
                $collectionResource[] = new SangyoiMachingNgResource($item);
            }
        }

        try {
            return  $collectionResource;
        } catch (\Throwable $th) {
            return $collectionResource;
        }
    }
}
