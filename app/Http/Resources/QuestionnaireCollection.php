<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionnaireCollection extends JsonResource
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
                $collectionResource[] = new QuestionnaireResource($item);
            }
        }

        try {
            return $collectionResource;
        } catch (\Throwable $th) {
            return $collectionResource;
        }
    }
}
