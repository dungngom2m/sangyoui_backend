<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * Class MUser
 *
 * @property int $id
 * @property int $user_company_id
 * @property string $mailaddr
 * @property string $name
 * @property string $name_kana
 * @property string|null $password
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property string|null $token
 * @property Carbon|null $token_issued
 *
 * @property MUserCompany $mUserCompany
 *
 * @package App\Models
 */
class MUser extends Authenticatable implements JWTSubject
{
	use SoftDeletes;
	protected $table = 'm_user';

	protected $casts = [
		'id' => 'int',
		'user_company_id' => 'int',
		'token_issued' => 'datetime'
	];

	protected $hidden = [
		'password',
		'token'
	];

	protected $fillable = [
		'user_company_id',
		'mailaddr',
		'name',
		'name_kana',
		'password',
		'regist_id',
		'update_id',
		'token',
		'token_issued'
	];

	public function mUserCompany()
	{
		return $this->belongsTo(MUserCompany::class, 'user_company_id');
	}

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
