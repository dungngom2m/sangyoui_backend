<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TCertificationCode
 *
 * @property int $id
 * @property string $sms_number
 * @property string $certification_code
 * @property string $certification_status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class TCertificationCode extends Model
{
	use SoftDeletes;
	protected $table = 't_certification_code';

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'sms_number',
		'certification_code',
		'certification_status'
	];
}
