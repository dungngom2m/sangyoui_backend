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
 * Class TCounselingReserveNotice
 *
 * @property int $id
 * @property int $user_company_id
 * @property int $client_id
 * @property string $employee_id
 * @property Carbon $target_month
 * @property Carbon $notice_date
 * @property int $implementation_status
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property MClientEmployee $mClientEmployee
 * @property Collection|TReportGeneral[] $tReportGenerals
 * @property Collection|TReportHospital[] $tReportHospitals
 * @property Collection|TQuestionAnswer[] $tQuestionAnswers
 * @property Collection|TCounselingReserve[] $tCounselingReserves
 * @property Collection|TKihoninfGeneral[] $tKihoninfGenerals
 * @property Collection|TKihoninfHospital[] $tKihoninfHospitals
 *
 * @package App\Models
 */
class TCounselingReserveNotice extends Model
{
	use SoftDeletes;
	protected $table = 't_counseling_reserve_notice';

	protected $casts = [
		'id' => 'int',
		'user_company_id' => 'int',
		'client_id' => 'int',
		'target_month' => 'datetime',
		'notice_date' => 'datetime',
		'implementation_status' => 'int'
	];

	protected $fillable = [
		'user_company_id',
		'client_id',
		'employee_id',
		'target_month',
		'notice_date',
		'implementation_status',
		'regist_id',
		'update_id'
	];

    public function mClientEmployee()
	{
		return $this->belongsTo(MClientEmployee::class)
					->where('user_company_id', $this->user_company_id)
					->where('client_id', $this->client_id)
					->where('employee_number', $this->employee_id);
	}

	public function tReportGenerals()
	{
		return $this->hasMany(TReportGeneral::class, 'reserve_issue_id');
	}

	public function tReportHospitals()
	{
		return $this->hasMany(TReportHospital::class, 'reserve_issue_id');
	}

	public function tQuestionAnswers()
	{
		return $this->hasMany(TQuestionAnswer::class, 'reserve_issue_id');
	}

	public function tCounselingReserves()
	{
		return $this->hasMany(TCounselingReserve::class, 'reserve_issue_id');
	}

	public function tKihoninfGenerals()
	{
		return $this->hasMany(TKihoninfGeneral::class, 'reserve_issue_id');
	}

	public function tKihoninfHospitals()
	{
		return $this->hasMany(TKihoninfHospital::class, 'reserve_issue_id');
	}
}
