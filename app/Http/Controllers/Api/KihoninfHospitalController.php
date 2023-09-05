<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TKihoninfHospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KihoninfHospitalController extends Controller
{
    /**
     * Create a new KihoninfHospitalController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Store data.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'hospitalName' => ['required', 'string', 'max:100'],
                'department' => ['required', 'string', 'max:100'],
                'employeeNo' => ['required', 'string', 'max:100'],
                'name' => ['required', 'string', 'max:100'],
                'nameKana' => ['required', 'string', 'max:100'],
                'birthdayYear' => ['required', 'integer'],
                'birthdayMonth' => ['required', 'integer'],
                'birthdayDay' => ['required', 'integer'],
                'sex' => ['required', 'integer'],
                'jikangaiKbnLastmonth' => ['required', 'integer'],
                // 'intervalLow9FlgLastmonth' => ['required', 'string', 'max:1'],
                // 'intervalLow18FlgLastmonth' => ['required', 'string', 'max:1'],
                'jikangaiKbn' => ['required', 'integer'],
                // 'intervalLow9Flg' => ['required', 'string', 'max:1'],
                // 'intervalLow18Flg' => ['required', 'string', 'max:1'],
                'busyKbn' => ['required', 'integer'],
                'oncallCnt' => ['required', 'integer'],
                'tocyokuCnt' => ['required', 'integer'],
                'niccyokuCnt' => ['required', 'integer'],
                'tukinHour' => ['required', 'integer'],
                'tukinMin' => ['required', 'integer'],
                'tukinKbn' => ['required', 'integer'],
                // 'fukugyoHour' => ['integer'],
                // 'fukugyoTukinHour' => ['integer'],
                // 'fukugyoTukinMin' => ['integer'],
                'suiminHourWdKbn' => ['required', 'integer'],
                'suiminHourHdKbn' => ['required', 'integer'],
                'kisyoDiffHourKbn' => ['required', 'integer'],
                // 'holidayCntLastmonth' => ['integer'],
                'holidayCntFumeiFlg' => ['required', 'string', 'max:1'],
                'yukyuKbn' => ['required', 'integer'],
                // 'doctorFusokuFlg' => ['required', 'string', 'max:1'],
                // 'kodoGyomuFlg' => ['required', 'string', 'max:1'],
                // 'studyNoneFlg' => ['required', 'string', 'max:1'],
                // 'fukugyoNeedFlg' => ['required', 'string', 'max:1'],
                // 'doctorComFlg' => ['required', 'string', 'max:1'],
                // 'noDoctorComFlg' => ['required', 'string', 'max:1'],
                // 'otherFlg9' => ['required', 'string', 'max:1'],
                'otherMemo9' => ['max:100'],
                // 'ryoritsuFlg' => ['required', 'string', 'max:1'],
                // 'kyoyoFlg' => ['required', 'string', 'max:1'],
                // 'koreisyaKaigoFlg' => ['required', 'string', 'max:1'],
                // 'byoninKaigoFlg' => ['required', 'string', 'max:1'],
                // 'tukinLongFlg' => ['required', 'string', 'max:1'],
                // 'otherFlg10' => ['required', 'string', 'max:1'],
                'otherMemo10' => ['max:100'],
                'chiryoKbn' => ['required', 'integer'],
                'chiryoMemo' => ['max:1000'],
                'sochiKbn' => ['required', 'integer'],
                'insyuKbn' => ['required', 'integer'],
                'kitsuenKbn' => ['required', 'integer'],
                // 'tokkiNoneFlg' => ['required', 'string', 'max:1'],
                // 'sleepyFlg' => ['required', 'string', 'max:1'],
                // 'fatFlg' => ['required', 'string', 'max:1'],
                // 'otherFlg12' => ['required', 'string', 'max:1'],
                'otherMemo12' => ['max:100'],
                'memo' => ['max:1000'],
                'noticeId' => ['required', 'integer'],
            ];

            $validator = Validator::make($request->all(), $rules, [], [
                'hospitalName' => '病院名',
                'department' => '所属',
                'employeeNo' => '職員番号',
                'name' => '氏名',
                'nameKana' => 'ふりがな',
                'birthdayYear' => '生年月日_年',
                'birthdayMonth' => '生年月日_月',
                'birthdayDay' => '生年月日_日',
                'sex' => '性別',
                'jikangaiKbnLastmonth' => '時間外・休日労働時間区分（先月）',
                'jikangaiKbn' => '時間外・休日労働時間区分（当月）',
                'busyKbn' => '多忙継続区分',
                'oncallCnt' => 'オンコール回数',
                'tocyokuCnt' => '当直回数',
                'niccyokuCnt' => '日直回数',
                'tukinHour' => '通勤時間_時',
                'tukinMin' => '通勤時間_分',
                'tukinKbn' => '通勤状況区分',
                'suiminHourWdKbn' => '睡眠時間区分（平日）',
                'suiminHourHdKbn' => '睡眠時間区分（休日）',
                'kisyoDiffHourKbn' => '起床時間差区分',
                'holidayCntFumeiFlg' => '完全休日日数不明フラグ（先月）',
                'yukyuKbn' => '有給消化日数区分',
                'otherMemo9' => 'その他備考_設問９',
                'otherMemo10' => 'その他備考_設問１０',
                'chiryoKbn' => '治療中区分',
                'chiryoMemo' => '治療中備考',
                'sochiKbn' => '措置指示区分',
                'insyuKbn' => '飲酒区分',
                'kitsuenKbn' => '喫煙区分',
                'otherMemo12' => 'その他備考_設問１２',
                'memo' => '要望備考',
                'noticeId' => '面談予約通知ID',
            ]);
            if ($validator->fails()) {
                return $this->response(422, [], '', $validator->errors());
            }

            $account = auth()->guard('code')->user();

            $kHospital = new TKihoninfHospital();
            $kHospital->hospital_name = $request->hospitalName;
            $kHospital->department = $request->department;
            $kHospital->employee_no = $request->employeeNo;
            $kHospital->name = $request->name;
            $kHospital->name_kana = $request->nameKana;
            $kHospital->birthday_year = $request->birthdayYear;
            $kHospital->birthday_month = $request->birthdayMonth;
            $kHospital->birthday_day = $request->birthdayDay;
            $kHospital->sex = $request->sex;
            $kHospital->jikangai_kbn_lastmonth = $request->jikangaiKbnLastmonth;

            $kHospital->interval_low9_flg_lastmonth = in_array(1, $request->intervalLow9FlgLastmonthGroup) ? 1 : 0; // 1- intervalLow9FlgLastmonth
            $kHospital->interval_low18_flg_lastmonth = in_array(2, $request->intervalLow9FlgLastmonthGroup) ? 1 : 0; // 2 - intervalLow18FlgLastmonth

            $kHospital->jikangai_kbn = $request->jikangaiKbn;

            $kHospital->interval_low9_flg = in_array(1, $request->intervalLow9FlgGroup) ? 1 : 0; // 1 - intervalLow9Flg
            $kHospital->interval_low18_flg = in_array(2, $request->intervalLow9FlgGroup) ? 1 : 0; // 2 - intervalLow18Flg

            $kHospital->busy_kbn = $request->busyKbn;
            $kHospital->oncall_cnt = $request->oncallCnt;
            $kHospital->tocyoku_cnt = $request->tocyokuCnt;
            $kHospital->niccyoku_cnt = $request->niccyokuCnt;
            $kHospital->tukin_hour = $request->tukinHour;
            $kHospital->tukin_min = $request->tukinMin;
            $kHospital->tukin_kbn = $request->tukinKbn;
            $kHospital->fukugyo_hour = $request->fukugyoHour ?? null;
            $kHospital->fukugyo_tukin_hour = $request->fukugyoTukinHour ?? null;
            $kHospital->fukugyo_tukin_min = $request->fukugyoTukinMin ?? null;
            $kHospital->suimin_hour_wd_kbn = $request->suiminHourWdKbn;
            $kHospital->suimin_hour_hd_kbn = $request->suiminHourHdKbn;
            $kHospital->kisyo_diff_hour_kbn = $request->kisyoDiffHourKbn;
            $kHospital->holiday_cnt_lastmonth = $request->holidayCntLastmonth ?? null;
            $kHospital->holiday_cnt_fumei_flg = $request->holidayCntFumeiFlg;
            $kHospital->yukyu_kbn = $request->yukyuKbn;

            $kHospital->doctor_fusoku_flg = in_array(1, $request->doctorFusokuFlgGroup) ? 1 : 0; // 1 - doctorFusokuFlg
            $kHospital->kodo_gyomu_flg = in_array(2, $request->doctorFusokuFlgGroup) ? 1 : 0; // 2 - kodoGyomuFlg
            $kHospital->study_none_flg = in_array(3, $request->doctorFusokuFlgGroup) ? 1 : 0; // 3 - studyNoneFlg
            $kHospital->fukugyo_need_flg = in_array(4, $request->doctorFusokuFlgGroup) ? 1 : 0; // 4 - fukugyoNeedFlg
            $kHospital->doctor_com_flg = in_array(5, $request->doctorFusokuFlgGroup) ? 1 : 0; // 5 - doctorComFlg
            $kHospital->no_doctor_com_flg = in_array(6, $request->doctorFusokuFlgGroup) ? 1 : 0; // 6 - noDoctorComFlg
            $kHospital->other_flg_9 = in_array(7, $request->doctorFusokuFlgGroup) ? 1 : 0; // 7 - otherFlg9

            $kHospital->other_memo_9 = $request->otherMemo9 ?? null;

            $kHospital->ryoritsu_flg = in_array(1, $request->ryoritsuFlgGroup) ? 1 : 0; // 1 - ryoritsuFlg
            $kHospital->kyoyo_flg = in_array(2, $request->ryoritsuFlgGroup) ? 1 : 0; // 2 - kyoyoFlg
            $kHospital->koreisya_kaigo_flg = in_array(3, $request->ryoritsuFlgGroup) ? 1 : 0; // 3 - koreisyaKaigoFlg
            $kHospital->byonin_kaigo_flg = in_array(4, $request->ryoritsuFlgGroup) ? 1 : 0; // 4 - byoninKaigoFlg
            $kHospital->tukin_long_flg = in_array(5, $request->ryoritsuFlgGroup) ? 1 : 0; // 5 - tukinLongFlg
            $kHospital->other_flg_10 = in_array(6, $request->ryoritsuFlgGroup) ? 1 : 0; // 6 - otherFlg10

            $kHospital->other_memo_10 = $request->otherMemo10 ?? null;

            $kHospital->chiryo_kbn = $request->chiryoKbn;
            $kHospital->chiryo_memo = $request->chiryoMemo ?? null;
            $kHospital->sochi_kbn = $request->sochiKbn;
            $kHospital->insyu_kbn = $request->insyuKbn;
            $kHospital->kitsuen_kbn = $request->kitsuenKbn;

            $kHospital->tokki_none_flg = in_array(1, $request->tokkiNoneFlgGroup) ? 1 : 0; // 1 - tokkiNoneFlg
            $kHospital->sleepy_flg = in_array(2, $request->tokkiNoneFlgGroup) ? 1 : 0; // 2 - sleepyFlg
            $kHospital->fat_flg = in_array(3, $request->tokkiNoneFlgGroup) ? 1 : 0; // 3 - fatFlg
            $kHospital->other_flg_12 = in_array(4, $request->tokkiNoneFlgGroup) ? 1 : 0; // 4 - otherFlg12

            $kHospital->other_memo_12 = $request->otherMemo12 ?? null;
            $kHospital->memo = $request->memo ?? null;
            $kHospital->reserve_issue_id = $request->noticeId;
            $kHospital->regist_id = $account->id;
            $kHospital->update_id = $account->id;
            $kHospital->save();

            return $this->response(200, [
                'result' => $kHospital ? true: false
            ], __('text.store_succeed', ['attribute' => '病院向け基本情報']));
        } catch (\Exception $ex) {
            return $this->response(500, [
                'error' => $ex->getMessage()
            ], __('text.store_failed', ['attribute' => '病院向け基本情報']));
        }
    }
}
