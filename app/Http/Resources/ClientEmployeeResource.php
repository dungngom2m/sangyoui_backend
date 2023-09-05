<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ClientEmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $managers = [];

        for ($i = 1; $i <= 5; $i++) {
            if ($this['manager_id_'.$i]) {
                array_push($managers, [
                    'id' => $this['manager_id_'.$i],
                    'name' => $this['manager_name_'.$i]
                ]);
            }
        }

        try {
            if ($this->kenkoshindankekka_filepath) {
                $explodeStr = explode('/', $this->kenkoshindankekka_filepath);
                $fullDate = $explodeStr[2] . '-' . $explodeStr[3] . '-' . $explodeStr[4];

                $pdfFileInfo = [
                    'name' => basename($this->kenkoshindankekka_filepath),
                    'createdAt' => $fullDate
                ];
            } else {
                $pdfFileInfo = null;
            }
        } catch (\Exception $ex) {
            $pdfFileInfo = null;
        }

        return [
            'id' => $this->id,
            'employeeNumber' => $this->employee_number ?? '',
            'name' => $this->name ?? '',
            'nameKana' => $this->name_kana ?? '',
            'employeeType' => $this->employee_type ?? '',
            'busho' => $this->busho ?? '',
            'yakushoku' => $this->yakushoku ?? '',
            'jigyosho' => $this->jigyosho ?? '',
            'managerName1' => $this->manager_name_1 ?? '',
            'nyushaDate' => CommonHelper::formatDatetime($this->nyusha_date) ?? '',
            'sex' => $this->sex ?? 0,
            'smsNumber' => $this->sms_number ?? '',
            'retirementDate' => CommonHelper::formatDatetime($this->retirement_date) ?? '',
            'retirementFlg' => $this->retirement_flg ?? 0,
            'telNumber' => $this->tel_number ?? '',
            'mailAddr' => $this->mailaddr ?? '',
            'kenkoshindankekkaUpdateDate' => $this->kenkoshindankekka_update_date ?? null,
            'kenkoshindankekkaFilepath' => $this->kenkoshindankekka_filepath ?? null,
            'managers' => $managers,
            'pdfFileInfo' => $pdfFileInfo,
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
