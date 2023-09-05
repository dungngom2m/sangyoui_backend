<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class SangyoiDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        try {
            if ($this->shousho_file_path) {
                $explodeStr = explode('/', $this->shousho_file_path);
                $fullDate = $explodeStr[2] . '-' . $explodeStr[3] . '-' . $explodeStr[4];

                $shoushoFileInfo = [
                    'name' => basename($this->shousho_file_path),
                    'createdAt' => $fullDate
                ];
            } else {
                $shoushoFileInfo = null;
            }
        } catch (\Exception $ex) {
            $shoushoFileInfo = null;
        }

        return [
            'id' => $this->id,
            'hospitalNumber' => $this->hospital_number ?? '',
            'hospitalName' => $this->hospital_name ?? '',
            'mainClinicalDepartment' => $this->main_clinical_department ?? '',
            'employeeNumber' => $this->employee_number ?? '',
            'name' => $this->name ?? '',
            'nameKana' => $this->name_kana ?? '',
            'birthday' => CommonHelper::formatDatetime($this->birthday) ?? '',
            'sex' => $this->sex ?? '',
            'postNumber' => $this->post_number ?? '',
            'chiikiCd' => $this->chiiki_cd ?? '',
            'todofuken' => $this->todofuken ?? '',
            'shikucyoson' => $this->shikucyoson ?? '',
            'tatemono' => $this->tatemono ?? '',
            'heyabango' => $this->heyabango ?? '',
            'shoruiFlg' => $this->shorui_flg ?? '',
            'shoruiPostNumber' => $this->shorui_post_number ?? '',
            'shoruiTodofuken' => $this->shorui_todofuken ?? '',
            'shoruiShikucyoson' => $this->shorui_shikucyoson ?? '',
            'shoruiHeyabango' => $this->shorui_heyabango ?? '',
            'shoruiTatemono' => $this->shorui_tatemono ?? '',
            'contactMailaddr' => $this->contact_mailaddr ?? '',
            'contactTelnumber' => $this->contact_telnumber ?? '',
            'shozokuKbn' => $this->shozoku_kbn ?? '',
            'shozoku' => $this->shozoku ?? '',
            'shozokuBusho' => $this->shozoku_busho ?? '',
            'clinicalDepartment' => $this->clinical_department ?? '',
            'keiyakuKbn' => $this->keiyaku_kbn ?? '',
            'kyuyoKbn' => $this->kyuyo_kbn ?? '',
            'price' => ($this->price_1 || $this->price_2) ? 1 : 0,
            'price1' => $this->price_1 ?? '',
            'price2' => $this->price_2 ?? '',
            'ginkoName' => $this->ginko_name ?? '',
            'ginkoShitenName' => $this->ginko_shiten_name ?? '',
            'ginkoShitenNameKana' => $this->ginko_shiten_name_kana ?? '',
            'kozaType' => $this->koza_type ?? '',
            'kozaNameKana' => $this->koza_name_kana ?? '',
            'kozaNumber' => $this->koza_number ?? '',
            'invoiceNumber' => $this->invoice_number ?? '',
            'shoushoNumber' => $this->shousho_number ?? '',
            'nihonishiLicenseFlg' => $this->nihonishi_license_flg ?? '',
            'sangyoiDiplomaLicenseFlg' => $this->sangyoi_diploma_license_flg ?? '',
            'consultantLicenseFlg' => $this->consultant_license_flg ?? '',
            'otherLicenseFlg' => $this->other_license_flg ?? '',
            'otherLicenseMemo' => $this->other_license_memo ?? '',
            'sangyoiExperience' => $this->sangyoi_experience ?? '',
            'counselingExperience' => $this->counseling_experience ?? '',
            'clinicalExperience' => $this->clinical_experience ?? '',
            'zoomAccountId' => $this->zoom_account_id ?? '',
            'zoomClientId' => $this->zoom_client_id ?? '',
            'zoomClientSecret' => $this->zoom_client_secret ?? '',
            'zoomMailaddr' => $this->zoom_mailaddr ?? '',
            'memo' => $this->memo ?? '',
            'shoushoFilePath' => $this->shousho_file_path ?? '',
            'shoushoFileInfo' => $shoushoFileInfo,
            'createdAt' =>  CommonHelper::formatDatetime($this->created_at),
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at),
        ];
    }
}
