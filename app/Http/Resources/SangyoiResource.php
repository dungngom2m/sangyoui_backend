<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Api\SangyoiController;
use Illuminate\Http\Resources\Json\JsonResource;

class SangyoiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $keiyakuKbn = '';

        foreach(SangyoiController::keiyakuKbn as $item) {
            if ($item['id'] == $this->keiyaku_kbn) {
                $keiyakuKbn = $item['label'];
                break;
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name ?? '',
            'nameKana' => $this->name_kana ?? '',
            'shozoku' => $this->shozoku ?? '',
            'keiyakuKbn' => $keiyakuKbn,
            'contactMailaddr' => $this->contact_mailaddr ?? '',
            'contactTelnumber' => $this->contact_telnumber ?? '',
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
