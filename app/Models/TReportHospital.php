<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TReportHospital
 *
 * @property int $id
 * @property int $reserve_issue_id
 * @property string $report_status
 * @property string|null $work_situation
 * @property int $suimin_situation
 * @property string|null $suimin_situation_memo
 * @property int $hirou_situation
 * @property string|null $hirou_situation_memo
 * @property string|null $other_memo
 * @property string $syugyo_taisyo_fuyo_flg
 * @property string $shinshin_keizoku_flg
 * @property string|null $shinshin_keizoku_memo
 * @property string $shinshin_jushin_flg
 * @property string|null $shinshin_jushin_memo
 * @property string $shinshin_renkei_flg
 * @property string|null $shinshin_renkei_memo
 * @property string $shinshin_other_flg
 * @property string|null $shinshin_other_memo
 * @property string $kinmujokyo_1_flg
 * @property string $kinmujokyo_2_flg
 * @property string $kinmujokyo_other_flg
 * @property string|null $kinmujokyo_other_memo
 * @property string|null $tokki_memo
 * @property string|null $mensetsu_ishi_shozoku
 * @property string|null $sangyoi_iken
 * @property Carbon|null $iken_update_date
 * @property string|null $iken_update_person_name
 * @property string|null $sochi_naiyo
 * @property Carbon|null $sochi_update_date
 * @property string|null $iryokikan_name
 * @property string|null $kanrisha_name
 * @property string|null $jigyosha_name
 * @property string $open_flg
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
class TReportHospital extends Model
{
	use SoftDeletes;
	protected $table = 't_report_hospital';

	protected $casts = [
		'id' => 'int',
		'reserve_issue_id' => 'int',
		'suimin_situation' => 'int',
		'hirou_situation' => 'int',
		'iken_update_date' => 'datetime',
		'sochi_update_date' => 'datetime'
	];

	protected $fillable = [
		'reserve_issue_id',
		'report_status',
		'work_situation',
		'suimin_situation',
		'suimin_situation_memo',
		'hirou_situation',
		'hirou_situation_memo',
		'other_memo',
		'syugyo_taisyo_fuyo_flg',
		'shinshin_keizoku_flg',
		'shinshin_keizoku_memo',
		'shinshin_jushin_flg',
		'shinshin_jushin_memo',
		'shinshin_renkei_flg',
		'shinshin_renkei_memo',
		'shinshin_other_flg',
		'shinshin_other_memo',
		'kinmujokyo_1_flg',
		'kinmujokyo_2_flg',
		'kinmujokyo_other_flg',
		'kinmujokyo_other_memo',
		'tokki_memo',
		'mensetsu_ishi_shozoku',
		'sangyoi_iken',
		'iken_update_date',
		'iken_update_person_name',
		'sochi_naiyo',
		'sochi_update_date',
		'iryokikan_name',
		'kanrisha_name',
		'jigyosha_name',
		'open_flg',
		'regist_id',
		'update_id'
	];

	public function tCounselingReserveNotice()
	{
		return $this->belongsTo(TCounselingReserveNotice::class, 'reserve_issue_id');
	}
}
