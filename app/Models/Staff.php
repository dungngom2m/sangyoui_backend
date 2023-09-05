<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property integer $id
 * @property integer $department_id
 * @property string $code
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $email_verified_at
 * @property string $address
 * @property string $token_reset_password
 * @property string $remember_token
 * @property integer $station_id
 * @property string $start_work
 * @property string $end_work
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contractor[] $contractors
 * @property Investor[] $investors
 * @property Project[] $projects
 * @property Department $department
 * @property Station $station
 */
class Staff extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'staffs';
    protected $guard = 'admins';

    /**
     * @var array
     */
    protected $fillable = ['role_id', 'code', 'name', 'phone', 'email', 'password', 'email_verified_at', 'address', 'token_reset_password', 'remember_token', 'station_id', 'start_work', 'end_work', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contractors()
    {
        return $this->hasMany('App\Models\Contractor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function investors()
    {
        return $this->hasMany('App\Models\Investor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo('App\Models\Station');
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
