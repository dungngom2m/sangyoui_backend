<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class CounselingReserveNoticeHospitalDetailResource extends JsonResource
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
            'createdAt' => CommonHelper::formatDatetime($this->created_at) ?? '',
            'updatedAt' => CommonHelper::formatDatetime($this->updated_at) ?? '',
            'updateId' => $this->update_id ?? '',
            'nameKana' => $this->name_kana ?? '',
            'name' => $this->name ?? '',
            'department' => $this->department ?? '',
            'birthdayYear' => $this->birthday_year ?? '',
            'birthdayMonth' => $this->birthday_month ?? '',
            'birthdayDay' => $this->birthday_day ?? '',
            'workSituation' => $this->work_situation ?? '',
            'suiminSituation' => $this->suimin_situation ?? '',
            'suiminSituationMemo' => $this->suimin_situation_memo ?? '',
            'hirouSituation' => $this->hirou_situation ?? '',
            'hirouSituationMemo' => $this->hirou_situation_memo ?? '',
            'otherMemo' => $this->other_memo ?? '',
            'syugyoTaisyoFuyoFlg' => $this->syugyo_taisyo_fuyo_flg ?? '',
            'shinshinKeizokuFlg' => $this->shinshin_keizoku_flg ?? '',
            'shinshinKeizokuMemo' => $this->shinshin_keizoku_memo ?? '',
            'shinshinJushinFlg' => $this->shinshin_jushin_flg ?? '',
            'shinshinJushinMemo' => $this->shinshin_jushin_memo ?? '',
            'shinshinRenkeiFlg' => $this->shinshin_renkei_flg ?? '',
            'shinshinRenkeiMemo' => $this->shinshin_renkei_memo ?? '',
            'shinshinOtherFlg' => $this->shinshin_other_flg ?? '',
            'shinshinOtherMemo' => $this->shinshin_other_memo ?? '',
            'kinmujokyo1Flg' => $this->kinmujokyo_1_flg ?? '',
            'kinmujokyo2Flg' => $this->kinmujokyo_2_flg ?? '',
            'kinmujokyoOtherFlg' => $this->kinmujokyo_other_flg ?? '',
            'kinmujokyoOtherMemo' => $this->kinmujokyo_other_memo ?? '',
            'tokkiMemo' => $this->tokki_memo ?? '',
            'reserveDate' => CommonHelper::formatDatetime($this->reserve_date) ?? '',
            'mensetsuIshiShozoku' => $this->mensetsu_ishi_shozoku ?? '',
            'sangyoiName' => $this->sangyoi_name ?? '',
            'empId' => $this->emp_id ?? '',
            'implementationStatus' => $this->implementation_status ?? '',
        ];
    }
}
