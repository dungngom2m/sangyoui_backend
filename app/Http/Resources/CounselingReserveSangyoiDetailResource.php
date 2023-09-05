<?php

namespace App\Http\Resources;

use App\Helpers\CommonHelper;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CounselingReserveSangyoiDetailResource extends JsonResource
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
            'empName' => $this->emp_name ?? '',
            'empNameKana' => $this->emp_name_kana ?? '',
            'reserveDate' => $this->reserve_date ?? '',
            'sangyoiName' => $this->sangyoi_name ?? '',
            'quesCreatedAt' => CommonHelper::formatDatetime($this->ques_created_at) ?? '',
            'zoomMeetingId' => $this->zoom_meeting_id ?? '',
            'zoomMeetingPw' => $this->zoom_meeting_pw ?? '',
            'zoomMeetingUrl' => $this->zoom_meeting_url ?? '',
            'hospitalName' => $this->hospital_name ?? '',
            'department' => $this->department ?? '',
            'employeeNo' => $this->employee_no ?? '',
            'kihoName' => $this->kiho_name ?? '',
            'kihoNameKana' => $this->kiho_name_kana ?? '',
            'birthdayYear' => $this->birthday_year ?? '',
            'birthdayMonth' => $this->birthday_month ?? '',
            'birthdayDay' => $this->birthday_day ?? '',
            'sex' => $this->sex ?? '',
            'jikangaiKbnLastmonth' => $this->jikangai_kbn_lastmonth ?? '',
            'intervalLow9FlgLastmonth' => $this->interval_low9_flg_lastmonth ?? '',
            'intervalLow18FlgLastmonth' => $this->interval_low18_flg_lastmonth ?? '',
            'jikangaiKbn' => $this->jikangai_kbn ?? '',
            'intervalLow9Flg' => $this->interval_low9_flg ?? '',
            'intervalLow18Flg' => $this->interval_low18_flg ?? '',
            'busyKbn' => $this->busy_kbn ?? '',
            'oncallCnt' => $this->oncall_cnt ?? '',
            'tocyokuCnt' => $this->tocyoku_cnt ?? '',
            'niccyokuCnt' => $this->niccyoku_cnt ?? '',
            'tukinHour' => $this->tukin_hour ?? '',
            'tukinMin' => $this->tukin_min ?? '',
            'tukinKbn' => $this->tukin_kbn ?? '',
            'fukugyoHour' => $this->fukugyo_hour ?? '',
            'fukugyoTukinHour' => $this->fukugyo_tukin_hour ?? '',
            'fukugyoTukinMin' => $this->fukugyo_tukin_min ?? '',
            'suiminHourWdKbn' => $this->suimin_hour_wd_kbn ?? '',
            'suiminHourHdKbn' => $this->suimin_hour_hd_kbn ?? '',
            'kisyoDiffHourKbn' => $this->kisyo_diff_hour_kbn ?? '',
            'holidayCntLastmonth' => $this->holiday_cnt_lastmonth ?? '',
            'holidayCntFumeiFlg' => $this->holiday_cnt_fumei_flg ?? '',
            'yukyuKbn' => $this->yukyu_kbn ?? '',
            'doctorFusokuFlg' => $this->doctor_fusoku_flg ?? '',
            'kodoGyomuFlg' => $this->kodo_gyomu_flg ?? '',
            'studyNoneFlg' => $this->study_none_flg ?? '',
            'fukugyoNeedFlg' => $this->fukugyo_need_flg ?? '',
            'doctorComFlg' => $this->doctor_com_flg ?? '',
            'noDoctorComFlg' => $this->no_doctor_com_flg ?? '',
            'otherFlg9' => $this->other_flg_9 ?? '',
            'otherMemo9' => $this->other_memo_9 ?? '',
            'ryoritsuFlg' => $this->ryoritsu_flg ?? '',
            'kyoyoFlg' => $this->kyoyo_flg ?? '',
            'koreisyaKaigoFlg' => $this->koreisya_kaigo_flg ?? '',
            'tukinLongFlg' => $this->tukin_long_flg ?? '',
            'byoninKaigoFlg' => $this->byonin_kaigo_flg ?? '',
            'otherFlg10' => $this->other_flg_10 ?? '',
            'otherMemo10' => $this->other_memo_10 ?? '',
            'chiryoKbn' => $this->chiryo_kbn ?? '',
            'chiryoMemo' => $this->chiryo_memo ?? '',
            'sochiKbn' => $this->sochi_kbn ?? '',
            'insyuKbn' => $this->insyu_kbn ?? '',
            'kitsuenKbn' => $this->kitsuen_kbn ?? '',
            'tokkiNoneFlg' => $this->tokki_none_flg ?? '',
            'sleepyFlg' => $this->sleepy_flg ?? '',
            'fatFlg' => $this->fat_flg ?? '',
            'otherFlg12' => $this->other_flg_12 ?? '',
            'otherMemo12' => $this->other_memo_12 ?? '',
            'memo' => $this->memo ?? '',
            'hosCreatedAt' => CommonHelper::formatDatetime($this->hos_created_at) ?? '',
            'hosUpdatedAt' => CommonHelper::formatDatetime($this->hos_updated_at) ?? '',
            'hosUpdateId' => $this->hos_update_id ?? '',
            'hosWorkSituation' => $this->hos_work_situation ?? '',
            'hosSuiminSituation' => $this->hos_suimin_situation ?? '',
            'hosSuiminSituationMemo' => $this->hos_suimin_situation_memo ?? '',
            'hosHirouSituation' => $this->hos_hirou_situation ?? '',
            'hosHirouSituationMemo' => $this->hos_hirou_situation_memo ?? '',
            'hosOtherMemo' => $this->hos_other_memo ?? '',
            'hosSyugyoTaisyoFuyoFlg' => $this->hos_syugyo_taisyo_fuyo_flg ?? '',
            'hosTokkiMemo' => $this->hos_tokki_memo ?? '',
            'shozoku' => $this->shozoku ?? '',
            'empId' => $this->emp_id ?? '',
            'overtime' => $this->overtime ?? '',
            'countReserveOfDoctor' => $this->count_reserve_of_doctor ?? '',
            'implementationStatus' => $this->implementation_status ?? '',
        ];
    }
}
