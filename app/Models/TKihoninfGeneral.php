<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TKihoninfGeneral
 *
 * @property int $id
 * @property int $reserve_issue_id
 * @property string $employee_no
 * @property int $join_progress_year
 * @property int $join_progress_month
 * @property string $company_name
 * @property string|null $department
 * @property string $name
 * @property int $age
 * @property int $sex
 * @property int $jikangai_workhour_lastmonth
 * @property int $kyujitsu_workhour_lastmonth
 * @property int $total_workhour_lastmonth
 * @property int $tukin_hour
 * @property int $tukin_min
 * @property int $jikangai_workhour_2month_hour
 * @property int $jikangai_workhour_2month_min
 * @property int $jikangai_workhour_3month_hour
 * @property int $jikangai_workhour_3month_min
 * @property int $suimin_hour_from
 * @property int $suimin_hour_to
 * @property int $suimin_hour_total
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
class TKihoninfGeneral extends Model
{
	use SoftDeletes;
	protected $table = 't_kihoninf_general';

	protected $casts = [
		'id' => 'int',
		'reserve_issue_id' => 'int',
		'join_progress_year' => 'int',
		'join_progress_month' => 'int',
		'age' => 'int',
		'sex' => 'int',
		'jikangai_workhour_lastmonth' => 'int',
		'kyujitsu_workhour_lastmonth' => 'int',
		'total_workhour_lastmonth' => 'int',
		'tukin_hour' => 'int',
		'tukin_min' => 'int',
		'jikangai_workhour_2month_hour' => 'int',
		'jikangai_workhour_2month_min' => 'int',
		'jikangai_workhour_3month_hour' => 'int',
		'jikangai_workhour_3month_min' => 'int',
		'suimin_hour_from' => 'int',
		'suimin_hour_to' => 'int',
		'suimin_hour_total' => 'int'
	];

	protected $fillable = [
		'reserve_issue_id',
		'employee_no',
		'join_progress_year',
		'join_progress_month',
		'company_name',
		'department',
		'name',
		'age',
		'sex',
		'jikangai_workhour_lastmonth',
		'kyujitsu_workhour_lastmonth',
		'total_workhour_lastmonth',
		'tukin_hour',
		'tukin_min',
		'jikangai_workhour_2month_hour',
		'jikangai_workhour_2month_min',
		'jikangai_workhour_3month_hour',
		'jikangai_workhour_3month_min',
		'suimin_hour_from',
		'suimin_hour_to',
		'suimin_hour_total',
		'regist_id',
		'update_id'
	];

	public function tCounselingReserveNotice()
	{
		return $this->belongsTo(TCounselingReserveNotice::class, 'reserve_issue_id');
	}
}
