<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MMachingNg
 *
 * @property int $id
 * @property int $sangyoi_id
 * @property int $client_id
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property MSangyoi $mSangyoi
 * @property MClient $mClient
 *
 * @package App\Models
 */
class MMachingNg extends Model
{
	use SoftDeletes;
	protected $table = 'm_maching_ng';

	protected $casts = [
		'id' => 'int',
		'sangyoi_id' => 'int',
		'client_id' => 'int'
	];

	protected $fillable = [
		'sangyoi_id',
		'client_id',
		'regist_id',
		'update_id'
	];

	public function mSangyoi()
	{
		return $this->belongsTo(MSangyoi::class, 'sangyoi_id');
	}

	public function mClient()
	{
		return $this->belongsTo(MClient::class, 'client_id');
	}
}
