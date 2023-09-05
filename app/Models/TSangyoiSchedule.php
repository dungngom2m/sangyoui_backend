<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TSangyoiSchedule
 *
 * @property int $id
 * @property int $doctor_id
 * @property Carbon $schedule_date
 * @property time with time zone $schedule_time_from
 * @property string $reserved_flg
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property MSangyoi $mSangyoi
 * @property Collection|TCounselingReserve[] $tCounselingReserves
 *
 * @package App\Models
 */
class TSangyoiSchedule extends Model
{
	use SoftDeletes;
	protected $table = 't_sangyoi_schedule';

	protected $casts = [
		'id' => 'int',
		'doctor_id' => 'int',
		'schedule_date' => 'datetime',
		'schedule_time_from' => 'datetime:H:i'
	];

	protected $fillable = [
		'doctor_id',
		'schedule_date',
		'schedule_time_from',
		'reserved_flg',
		'regist_id',
		'update_id'
	];

	public function mSangyoi()
	{
		return $this->belongsTo(MSangyoi::class, 'doctor_id');
	}

	public function tCounselingReserves()
	{
		return $this->hasMany(TCounselingReserve::class, 'sangyoi_schedule_id');
	}
}
