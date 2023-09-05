<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveClientDetailPdfResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'clientName' => $this->client_name ?? '',
            'sum' => $this->sum ?? '',
            'userCompanyName' => $this->user_company_name ?? '',
            'postNumber' => $this->post_number ?? '',
            'todofuken' => $this->todofuken ?? '',
            'shikucyoson' => $this->shikucyoson ?? '',
            'tatemono' => $this->tatemono ?? '',
            'heyabango' => $this->heyabango ?? '',
            'telNumber' => $this->tel_number ?? '',
            'faxNumber' => $this->fax_number ?? '',
            'invoiceNumber' => $this->invoice_number ?? '',
            'seikyuTantosha' => $this->seikyu_tantosha ?? '',
        ];
    }
}
