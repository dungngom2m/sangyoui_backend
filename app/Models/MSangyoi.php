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
 * Class MSangyoi
 *
 * @property int $id
 * @property int $user_company_id
 * @property string $name
 * @property string $name_kana
 * @property Carbon $birthday
 * @property string $sex
 * @property string $post_number
 * @property string $todofuken
 * @property string $shikucyoson
 * @property string|null $tatemono
 * @property string|null $heyabango
 * @property int $chiiki_cd
 * @property string|null $shorui_flg
 * @property string|null $shorui_post_number
 * @property string|null $shorui_todofuken
 * @property string|null $shorui_shikucyoson
 * @property string|null $shorui_tatemono
 * @property string|null $shorui_heyabango
 * @property string $contact_mailaddr
 * @property string $contact_telnumber
 * @property int $shozoku_kbn
 * @property string|null $shozoku
 * @property string $shozoku_busho
 * @property string $clinical_department
 * @property int $keiyaku_kbn
 * @property int $kyuyo_kbn
 * @property int $price_1
 * @property int $price_2
 * @property string $ginko_name
 * @property string $ginko_shiten_name
 * @property string $ginko_shiten_name_kana
 * @property string $koza_type
 * @property string $koza_name_kana
 * @property string $koza_number
 * @property string|null $invoice_number
 * @property string $shousho_number
 * @property string $nihonishi_license_flg
 * @property string $sangyoi_diploma_license_flg
 * @property string $consultant_license_flg
 * @property string $other_license_flg
 * @property string|null $other_license_memo
 * @property int $sangyoi_experience
 * @property int $counseling_experience
 * @property int $clinical_experience
 * @property string $shousho_file_path
 * @property string|null $memo
 * @property string|null $password
 * @property string $zoom_account_id
 * @property string $zoom_client_id
 * @property string $zoom_client_secret
 * @property string $zoom_mailaddr
 * @property string|null $zoom_token
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property string|null $token
 * @property Carbon|null $token_issued
 *
 * @property MUserCompany $mUserCompany
 * @property Collection|TSangyoiSchedule[] $tSangyoiSchedules
 *
 * @package App\Models
 */
class MSangyoi extends Authenticatable implements JWTSubject
{
	use SoftDeletes;
	protected $table = 'm_sangyoi';

	protected $casts = [
		'id' => 'int',
		'user_company_id' => 'int',
		'birthday' => 'datetime',
		'chiiki_cd' => 'int',
		'shozoku_kbn' => 'int',
		'keiyaku_kbn' => 'int',
		'kyuyo_kbn' => 'int',
		'price_1' => 'int',
		'price_2' => 'int',
		'sangyoi_experience' => 'int',
		'counseling_experience' => 'int',
		'clinical_experience' => 'int',
		'token_issued' => 'datetime'
	];

	protected $hidden = [
		'password',
		'zoom_client_secret',
		'zoom_token',
		'token'
	];

	protected $fillable = [
		'user_company_id',
		'name',
		'name_kana',
		'birthday',
		'sex',
		'post_number',
		'todofuken',
		'shikucyoson',
		'tatemono',
		'heyabango',
		'chiiki_cd',
		'shorui_flg',
		'shorui_post_number',
		'shorui_todofuken',
		'shorui_shikucyoson',
		'shorui_tatemono',
		'shorui_heyabango',
		'contact_mailaddr',
		'contact_telnumber',
		'shozoku_kbn',
		'shozoku',
		'shozoku_busho',
		'clinical_department',
		'keiyaku_kbn',
		'kyuyo_kbn',
		'price_1',
		'price_2',
		'ginko_name',
		'ginko_shiten_name',
        'ginko_shiten_name_kana',
		'koza_type',
		'koza_name_kana',
		'koza_number',
		'invoice_number',
		'shousho_number',
		'nihonishi_license_flg',
		'sangyoi_diploma_license_flg',
		'consultant_license_flg',
		'other_license_flg',
		'other_license_memo',
		'sangyoi_experience',
		'counseling_experience',
		'clinical_experience',
		'shousho_file_path',
		'memo',
		'password',
        'zoom_account_id',
		'zoom_client_id',
		'zoom_client_secret',
		'zoom_mailaddr',
		'zoom_token',
		'regist_id',
		'update_id',
        'token',
		'token_issued'
	];

	public function mUserCompany()
	{
		return $this->belongsTo(MUserCompany::class, 'user_company_id');
	}

	public function tSangyoiSchedules()
	{
		return $this->hasMany(TSangyoiSchedule::class, 'doctor_id');
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
