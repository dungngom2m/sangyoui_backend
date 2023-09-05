<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientEmployeeCollection extends JsonResource
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
                $collectionResource[] = new ClientEmployeeResource($item);
            }
        }

        try {
            return [
                'data' => $collectionResource,
                'paginate' => [
                    'currentPage' => $this->currentPage(),
                    'total' => $this->total(),
                    'lastPage' => $this->lastPage()
                ]
            ];
        } catch (\Throwable $th) {
            return $collectionResource;
        }
    }
}
