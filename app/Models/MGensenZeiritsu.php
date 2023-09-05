<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MGensenZeiritsu
 *
 * @property int $id
 * @property float $zei_ritsu
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class MGensenZeiritsu extends Model
{
	use SoftDeletes;
	protected $table = 'm_gensen_zeiritsu';

	protected $casts = [
		'id' => 'int',
		'zei_ritsu' => 'float'
	];

	protected $fillable = [
		'zei_ritsu',
		'regist_id',
		'update_id'
	];
}
