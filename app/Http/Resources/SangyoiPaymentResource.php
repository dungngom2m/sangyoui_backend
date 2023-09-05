<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Api\SangyoiController;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiPaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $shozokuKbnOption = SangyoiController::shozokuKbn;
        $shozokuKbn = '';

        foreach($shozokuKbnOption as $item) {
            if ($this->shozoku_kbn == $item['id']) {
                $shozokuKbn = $item['label'];
                break;
            }
        }

        return [
            'id' => $this->id,
            'shozokuKbn' => $shozokuKbn,
            'shozoku' => $this->shozoku ?? '',
            'name' => $this->name ?? '',
            'nameKana' => $this->name_kana ?? '',
            'count' => $this->count ?? 0,
            'sum' => $this->sum ?? 0,
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
