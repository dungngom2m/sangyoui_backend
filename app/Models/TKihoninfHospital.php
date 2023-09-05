<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TKihoninfHospital
 *
 * @property int $id
 * @property int $reserve_issue_id
 * @property string $hospital_name
 * @property string $department
 * @property string $employee_no
 * @property string $name
 * @property string $name_kana
 * @property int $birthday_year
 * @property int $birthday_month
 * @property int $birthday_day
 * @property int $sex
 * @property int $jikangai_kbn_lastmonth
 * @property string $interval_low9_flg_lastmonth
 * @property string $interval_low18_flg_lastmonth
 * @property int $jikangai_kbn
 * @property string $interval_low9_flg
 * @property string $interval_low18_flg
 * @property int $busy_kbn
 * @property int $oncall_cnt
 * @property int $tocyoku_cnt
 * @property int $niccyoku_cnt
 * @property int $tukin_hour
 * @property int $tukin_min
 * @property int $tukin_kbn
 * @property int|null $fukugyo_hour
 * @property int|null $fukugyo_tukin_hour
 * @property int|null $fukugyo_tukin_min
 * @property int $suimin_hour_wd_kbn
 * @property int $suimin_hour_hd_kbn
 * @property int $kisyo_diff_hour_kbn
 * @property int|null $holiday_cnt_lastmonth
 * @property string $holiday_cnt_fumei_flg
 * @property int $yukyu_kbn
 * @property string $doctor_fusoku_flg
 * @property string $kodo_gyomu_flg
 * @property string $study_none_flg
 * @property string $fukugyo_need_flg
 * @property string $doctor_com_flg
 * @property string $no_doctor_com_flg
 * @property string $other_flg_9
 * @property string|null $other_memo_9
 * @property string $ryoritsu_flg
 * @property string $kyoyo_flg
 * @property string $koreisya_kaigo_flg
 * @property string $byonin_kaigo_flg
 * @property string $tukin_long_flg
 * @property string $other_flg_10
 * @property string|null $other_memo_10
 * @property int $chiryo_kbn
 * @property string|null $chiryo_memo
 * @property int $sochi_kbn
 * @property int $insyu_kbn
 * @property int $kitsuen_kbn
 * @property string $tokki_none_flg
 * @property string $sleepy_flg
 * @property string $fat_flg
 * @property string $other_flg_12
 * @property string|null $other_memo_12
 * @property string|null $memo
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property TCounselingReserveNotice $tCounselingReserveNotice
 *
 * @package App\Models
 */
class TKihoninfHospital extends Model
{
	use SoftDeletes;
	protected $table = 't_kihoninf_hospital';

	protected $casts = [
		'id' => 'int',
		'reserve_issue_id' => 'int',
		'birthday_year' => 'int',
		'birthday_month' => 'int',
		'birthday_day' => 'int',
		'sex' => 'int',
		'jikangai_kbn_lastmonth' => 'int',
		'jikangai_kbn' => 'int',
		'busy_kbn' => 'int',
		'oncall_cnt' => 'int',
		'tocyoku_cnt' => 'int',
		'niccyoku_cnt' => 'int',
		'tukin_hour' => 'int',
		'tukin_min' => 'int',
		'tukin_kbn' => 'int',
		'fukugyo_hour' => 'int',
		'fukugyo_tukin_hour' => 'int',
		'fukugyo_tukin_min' => 'int',
		'suimin_hour_wd_kbn' => 'int',
		'suimin_hour_hd_kbn' => 'int',
		'kisyo_diff_hour_kbn' => 'int',
		'holiday_cnt_lastmonth' => 'int',
		'yukyu_kbn' => 'int',
		'chiryo_kbn' => 'int',
		'sochi_kbn' => 'int',
		'insyu_kbn' => 'int',
		'kitsuen_kbn' => 'int'
	];

	protected $fillable = [
		'reserve_issue_id',
		'hospital_name',
		'department',
		'employee_no',
		'name',
		'name_kana',
		'birthday_year',
		'birthday_month',
		'birthday_day',
		'sex',
		'jikangai_kbn_lastmonth',
		'interval_low9_flg_lastmonth',
		'interval_low18_flg_lastmonth',
		'jikangai_kbn',
		'interval_low9_flg',
		'interval_low18_flg',
		'busy_kbn',
		'oncall_cnt',
		'tocyoku_cnt',
		'niccyoku_cnt',
		'tukin_hour',
		'tukin_min',
		'tukin_kbn',
		'fukugyo_hour',
		'fukugyo_tukin_hour',
		'fukugyo_tukin_min',
		'suimin_hour_wd_kbn',
		'suimin_hour_hd_kbn',
		'kisyo_diff_hour_kbn',
		'holiday_cnt_lastmonth',
		'holiday_cnt_fumei_flg',
		'yukyu_kbn',
		'doctor_fusoku_flg',
		'kodo_gyomu_flg',
		'study_none_flg',
		'fukugyo_need_flg',
		'doctor_com_flg',
		'no_doctor_com_flg',
		'other_flg_9',
		'other_memo_9',
		'ryoritsu_flg',
		'kyoyo_flg',
		'koreisya_kaigo_flg',
		'byonin_kaigo_flg',
		'tukin_long_flg',
		'other_flg_10',
		'other_memo_10',
		'chiryo_kbn',
		'chiryo_memo',
		'sochi_kbn',
		'insyu_kbn',
		'kitsuen_kbn',
		'tokki_none_flg',
		'sleepy_flg',
		'fat_flg',
		'other_flg_12',
		'other_memo_12',
		'memo',
		'regist_id',
		'update_id'
	];

	public function tCounselingReserveNotice()
	{
		return $this->belongsTo(TCounselingReserveNotice::class, 'reserve_issue_id');
	}
}
