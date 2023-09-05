<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TReportGeneral
 *
 * @property int $id
 * @property int $reserve_issue_id
 * @property string $report_status
 * @property int $hirou_situation
 * @property int $kenko_situation
 * @property string|null $kenko_situation_memo
 * @property int $shindan_kbn
 * @property string|null $shindan_kbn_memo
 * @property int $syugyo_kbn
 * @property int|null $syugyo_kbn2_naiyo_kbn
 * @property string|null $syugyo_kbn2_naiyo_memo
 * @property int|null $syugyo_kbn3_naiyo_kbn
 * @property int|null $syugyo_kbn3a_hour
 * @property int|null $syugyo_kbn3c_from_hour
 * @property int|null $syugyo_kbn3c_from_min
 * @property int|null $syugyo_kbn3c_to_hour
 * @property int|null $syugyo_kbn3c_to_min
 * @property int|null $syugyo_kbn4_naiyo_kbn
 * @property string|null $syugyo_kbn4_naiyo_memo
 * @property int|null $syochi_kikan
 * @property int|null $syochi_kikan_kbn
 * @property string|null $bikou
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
class TReportGeneral extends Model
{
	use SoftDeletes;
	protected $table = 't_report_general';

	protected $casts = [
		'id' => 'int',
		'reserve_issue_id' => 'int',
		'hirou_situation' => 'int',
		'kenko_situation' => 'int',
		'shindan_kbn' => 'int',
		'syugyo_kbn' => 'int',
		'syugyo_kbn2_naiyo_kbn' => 'int',
		'syugyo_kbn3_naiyo_kbn' => 'int',
		'syugyo_kbn3a_hour' => 'int',
		'syugyo_kbn3c_from_hour' => 'int',
		'syugyo_kbn3c_from_min' => 'int',
		'syugyo_kbn3c_to_hour' => 'int',
		'syugyo_kbn3c_to_min' => 'int',
		'syugyo_kbn4_naiyo_kbn' => 'int',
		'syochi_kikan' => 'int',
		'syochi_kikan_kbn' => 'int'
	];

	protected $fillable = [
		'reserve_issue_id',
		'report_status',
		'hirou_situation',
		'kenko_situation',
		'kenko_situation_memo',
		'shindan_kbn',
		'shindan_kbn_memo',
		'syugyo_kbn',
		'syugyo_kbn2_naiyo_kbn',
		'syugyo_kbn2_naiyo_memo',
		'syugyo_kbn3_naiyo_kbn',
		'syugyo_kbn3a_hour',
		'syugyo_kbn3c_from_hour',
		'syugyo_kbn3c_from_min',
		'syugyo_kbn3c_to_hour',
		'syugyo_kbn3c_to_min',
		'syugyo_kbn4_naiyo_kbn',
		'syugyo_kbn4_naiyo_memo',
		'syochi_kikan',
		'syochi_kikan_kbn',
		'bikou',
		'open_flg',
		'regist_id',
		'update_id'
	];

	public function tCounselingReserveNotice()
	{
		return $this->belongsTo(TCounselingReserveNotice::class, 'reserve_issue_id');
	}
}
