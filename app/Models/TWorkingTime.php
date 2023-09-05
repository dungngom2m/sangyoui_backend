<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TWorkingTime
 *
 * @property int $id
 * @property int $user_company_code
 * @property int $client_id
 * @property string $employee_number
 * @property string $year
 * @property string $month
 * @property int $overtime_bef_month
 * @property int $overtime
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property Carbon $target_month
 *
 * @property MClientEmployee $mClientEmployee
 *
 * @package App\Models
 */
class TWorkingTime extends Model
{
	use SoftDeletes;
	protected $table = 't_working_time';

	protected $casts = [
		'id' => 'int',
		'user_company_code' => 'int',
		'client_id' => 'int',
		'overtime_bef_month' => 'int',
		'overtime' => 'int',
		'target_month' => 'datetime'
	];

	protected $fillable = [
		'user_company_code',
		'client_id',
		'employee_number',
		'year',
		'month',
		'overtime_bef_month',
		'overtime',
		'regist_id',
		'update_id',
        'target_month'
	];

	public function mClientEmployee()
	{
		return $this->belongsTo(MClientEmployee::class)
                    ->where('user_company_id', $this->user_company_code)
                    ->where('client_id', $this->client_id)
                    ->where('employee_number', $this->employee_number);
	}
}
