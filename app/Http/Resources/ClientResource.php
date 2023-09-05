<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $managers = [
            [
                'name' => $this->manager_name_1 ?? '',
                'nameKana' => $this->manager_name_kana_1 ?? '',
                'mailAddr' => $this->manager_mailaddr_1 ?? '',
                'contactTelnumber' => $this->manager_contact_telnumber_1 ?? ''
            ],
            [
                'name' => $this->manager_name_2 ?? '',
                'nameKana' => $this->manager_name_kana_2 ?? '',
                'mailAddr' => $this->manager_mailaddr_2 ?? '',
                'contactTelnumber' => $this->manager_contact_telnumber_2 ?? ''
            ],
            [
                'name' => $this->manager_name_3 ?? '',
                'nameKana' => $this->manager_name_kana_3 ?? '',
                'mailAddr' => $this->manager_mailaddr_3 ?? '',
                'contactTelnumber' => $this->manager_contact_telnumber_3 ?? ''
            ],
            [
                'name' => $this->manager_name_4 ?? '',
                'nameKana' => $this->manager_name_kana_4 ?? '',
                'mailAddr' => $this->manager_mailaddr_4 ?? '',
                'contactTelnumber' => $this->manager_contact_telnumber_4 ?? ''
            ],
            [
                'name' => $this->manager_name_5 ?? '',
                'nameKana' => $this->manager_name_kana_5 ?? '',
                'mailAddr' => $this->manager_mailaddr_5 ?? '',
                'contactTelnumber' => $this->manager_contact_telnumber_5 ?? ''
            ]
        ];

        for ($i = 1; $i <= 5; $i++) {
            if ($this['manager_name_'.$i] == '' && $this['manager_name_kana_'.$i] == '' && $this['manager_mailaddr_'.$i] == '' && $this['manager_contact_telnumber_'.$i] == '') {
                unset($managers[$i - 1]);
            }
        }

        return [
            'id' => $this->id,
            'userCompanyId' => $this->user_company_id ?? '',
            'clientCode' => $this->client_code ?? '',
            'clientStatus' => $this->client_status ?? '',
            'clientName' => $this->client_name ?? '',
            'clientNameKana' => $this->client_name_kana ?? '',
            'keiyakuDate' => CommonHelper::formatDatetime($this->keiyaku_date) ?? null,
            'postNumber' => $this->post_number ?? '',
            'chiikiCd' => $this->chiiki_cd ?? '',
            'todofuken' => $this->todofuken ?? '',
            'chikucyoson' => $this->chikucyoson ?? '',
            'tatemono' => $this->tatemono ?? '',
            'heyabango' => $this->heyabango ?? '',
            'telNumber' => $this->tel_number ?? '',
            'apiKey' => $this->api_key ?? '',
            'overtimeBorder' => $this->overtime_border ?? '',
            'basePriceFixed' => $this->base_price_fixed ?? '',
            'basePriceParuse' => $this->base_price_paruse ?? '',
            'managers' => $managers,
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
