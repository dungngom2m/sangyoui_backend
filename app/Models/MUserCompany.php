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
 * Class MUserCompany
 *
 * @property int $id
 * @property string|null $user_company_name
 * @property string|null $user_company_name_kana
 * @property string|null $post_number
 * @property string|null $todofuken
 * @property string|null $shikucyoson
 * @property string|null $tatemono
 * @property string|null $heyabango
 * @property string|null $tel_number
 * @property string|null $fax_number
 * @property string|null $invoice_number
 * @property string|null $seikyu_tantosha
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|MClient[] $mClients
 * @property Collection|MClientEmployee[] $mClientEmployees
 * @property Collection|MClientUser[] $mClientUsers
 * @property Collection|MUser[] $mUsers
 * @property Collection|MQuestionnaire[] $mQuestionnaires
 * @property Collection|MSangyoi[] $mSangyois
 *
 * @package App\Models
 */
class MUserCompany extends Model
{
	use SoftDeletes;
	protected $table = 'm_user_company';

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'user_company_name',
		'user_company_name_kana',
		'post_number',
		'todofuken',
		'shikucyoson',
		'tatemono',
        'heyabango',
		'tel_number',
        'fax_number',
        'invoice_number',
        'seikyu_tantosha',
		'regist_id',
		'update_id'
	];

	public function mClients()
	{
		return $this->hasMany(MClient::class, 'user_company_id');
	}

	public function mClientEmployees()
	{
		return $this->hasMany(MClientEmployee::class, 'user_company_id');
	}

	public function mClientUsers()
	{
		return $this->hasMany(MClientUser::class, 'user_company_id');
	}

	public function mUsers()
	{
		return $this->hasMany(MUser::class, 'user_company_id');
	}

	public function mQuestionnaires()
	{
		return $this->hasMany(MQuestionnaire::class, 'user_company_id');
	}

	public function mSangyois()
	{
		return $this->hasMany(MSangyoi::class, 'user_company_id');
	}
}
