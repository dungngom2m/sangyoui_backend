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
 * Class MClient
 *
 * @property int $id
 * @property int $user_company_id
 * @property string $client_code
 * @property int $client_status
 * @property Carbon|null $keiyaku_date
 * @property string $client_name
 * @property string $client_name_kana
 * @property string $post_number
 * @property string $todofuken
 * @property string $chikucyoson
 * @property string|null $tatemono
 * @property string|null $heyabango
 * @property string $tel_number
 * @property string $manager_name_1
 * @property string $manager_name_kana_1
 * @property string $manager_mailaddr_1
 * @property string $manager_contact_telnumber_1
 * @property string|null $manager_name_2
 * @property string|null $manager_name_kana_2
 * @property string|null $manager_mailaddr_2
 * @property string|null $manager_contact_telnumber_2
 * @property string|null $manager_name_3
 * @property string|null $manager_name_kana_3
 * @property string|null $manager_mailaddr_3
 * @property string|null $manager_contact_telnumber_3
 * @property string|null $manager_name_4
 * @property string|null $manager_name_kana_4
 * @property string|null $manager_mailaddr_4
 * @property string|null $manager_contact_telnumber_4
 * @property string|null $manager_name_5
 * @property string|null $manager_name_kana_5
 * @property string|null $manager_mailaddr_5
 * @property string|null $manager_contact_telnumber_5
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property string|null $api_key
 * @property int $overtime_border
 * @property int $chiiki_cd
 * @property int $base_price_fixed
 * @property int $base_price_paruse
 *
 * @property MUserCompany $mUserCompany
 * @property Collection|MClientEmployee[] $mClientEmployees
 * @property Collection|MClientUser[] $mClientUsers
 *
 * @package App\Models
 */
class MClient extends Model
{
	use SoftDeletes;
	protected $table = 'm_client';

	protected $casts = [
		'id' => 'int',
		'user_company_id' => 'int',
		'client_status' => 'int',
		'keiyaku_date' => 'datetime',
		'overtime_border' => 'int',
		'chiiki_cd' => 'int',
		'base_price_fixed' => 'int',
		'base_price_paruse' => 'int'
	];

	protected $fillable = [
		'user_company_id',
		'client_code',
		'client_status',
		'keiyaku_date',
		'client_name',
		'client_name_kana',
		'post_number',
		'todofuken',
		'chikucyoson',
        'tatemono',
		'heyabango',
		'tel_number',
		'manager_name_1',
		'manager_name_kana_1',
		'manager_mailaddr_1',
		'manager_contact_telnumber_1',
		'manager_name_2',
		'manager_name_kana_2',
		'manager_mailaddr_2',
		'manager_contact_telnumber_2',
		'manager_name_3',
		'manager_name_kana_3',
		'manager_mailaddr_3',
		'manager_contact_telnumber_3',
		'manager_name_4',
		'manager_name_kana_4',
		'manager_mailaddr_4',
		'manager_contact_telnumber_4',
		'manager_name_5',
		'manager_name_kana_5',
		'manager_mailaddr_5',
		'manager_contact_telnumber_5',
		'regist_id',
		'update_id',
		'api_key',
        'overtime_border',
        'chiiki_cd',
        'base_price_fixed',
        'base_price_paruse'
	];

	public function mUserCompany()
	{
		return $this->belongsTo(MUserCompany::class, 'user_company_id');
	}

	public function mClientEmployees()
	{
		return $this->hasMany(MClientEmployee::class, 'client_id');
	}

	public function mClientUsers()
	{
		return $this->hasMany(MClientUser::class, 'client_id');
	}
}
