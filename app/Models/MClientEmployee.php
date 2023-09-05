<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

/**
 * Class MClientEmployee
 *
 * @property int $id
 * @property int $user_company_id
 * @property int $client_id
 * @property string $employee_number
 * @property string $name
 * @property string $name_kana
 * @property string $employee_type
 * @property string $busho
 * @property string $yakushoku
 * @property string $jigyosho
 * @property string $manager_id_1
 * @property string $manager_name_1
 * @property string|null $manager_id_2
 * @property string|null $manager_name_2
 * @property string|null $manager_id_3
 * @property string|null $manager_name_3
 * @property string|null $manager_id_4
 * @property string|null $manager_name_4
 * @property string|null $manager_id_5
 * @property string|null $manager_name_5
 * @property Carbon $nyusha_date
 * @property string $sex
 * @property string $sms_number
 * @property string|null $mailaddr
 * @property Carbon|null $kenkoshindankekka_update_date
 * @property string|null $kenkoshindankekka_filepath
 * @property Carbon|null $retirement_date
 * @property string $retirement_flg
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property string|null $token
 *
 * @property MUserCompany $mUserCompany
 * @property MClient $mClient
 * @property Collection|TWorkingTime[] $tWorkingTimes
 * @property Collection|TCounselingReserveNotice[] $tCounselingReserveNotices
 *
 * @package App\Models
 */
class MClientEmployee extends Authenticatable implements JWTSubject
{
	use SoftDeletes;
	protected $table = 'm_client_employee';

	protected $casts = [
		'id' => 'int',
		'user_company_id' => 'int',
		'client_id' => 'int',
		'nyusha_date' => 'datetime',
		'kenkoshindankekka_update_date' => 'datetime',
		'retirement_date' => 'datetime'
	];

	protected $fillable = [
		'user_company_id',
		'client_id',
		'employee_number',
		'name',
		'name_kana',
		'employee_type',
		'busho',
		'yakushoku',
        'jigyosho',
		'manager_id_1',
		'manager_name_1',
		'manager_id_2',
		'manager_name_2',
		'manager_id_3',
		'manager_name_3',
		'manager_id_4',
		'manager_name_4',
		'manager_id_5',
		'manager_name_5',
		'nyusha_date',
		'sex',
		'sms_number',
		'mailaddr',
		'kenkoshindankekka_update_date',
		'kenkoshindankekka_filepath',
		'retirement_date',
		'retirement_flg',
		'regist_id',
		'update_id',
		'token'
	];

	public function mUserCompany()
	{
		return $this->belongsTo(MUserCompany::class, 'user_company_id');
	}

	public function mClient()
	{
		return $this->belongsTo(MClient::class, 'client_id');
	}

	public function tWorkingTimes()
	{
		return $this->hasMany(TWorkingTime::class)
                    ->where('user_company_code', $this->user_company_id)
                    ->where('client_id', $this->client_id)
                    ->where('employee_number', $this->employee_number);
	}

	public function tCounselingReserveNotices()
	{
		return $this->hasMany(TCounselingReserveNotice::class)
                    ->where('user_company_id', $this->user_company_id)
                    ->where('client_id', $this->client_id)
                    ->where('employee_number', $this->employee_number);
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
