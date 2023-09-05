<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TCounselingReserve
 *
 * @property int $id
 * @property int $reserve_issue_id
 * @property int $sangyoi_schedule_id
 * @property Carbon $reserve_date
 * @property time with time zone $reserve_time_from
 * @property time with time zone $reserve_time_to
 * @property int $reserve_status
 * @property Carbon|null $cancel_date
 * @property int|null $cancel_person_type
 * @property string|null $cancel_reason
 * @property string $zoom_meeting_id
 * @property string $zoom_meeting_pw
 * @property string $zoom_meeting_url
 * @property int $counseling_type
 * @property int $price
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property TCounselingReserveNotice $tCounselingReserveNotice
 * @property TSangyoiSchedule $tSangyoiSchedule
 *
 * @package App\Models
 */
class TCounselingReserve extends Model
{
	use SoftDeletes;
	protected $table = 't_counseling_reserve';

	protected $casts = [
		'id' => 'int',
		'reserve_issue_id' => 'int',
		'sangyoi_schedule_id' => 'int',
		'reserve_date' => 'datetime',
		'reserve_time_from' => 'datetime:H:i',
		'reserve_time_to' => 'datetime:H:i',
		'reserve_status' => 'int',
		'cancel_date' => 'datetime',
		'cancel_person_type' => 'int',
		'counseling_type' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'reserve_issue_id',
		'sangyoi_schedule_id',
		'reserve_date',
		'reserve_time_from',
		'reserve_time_to',
		'reserve_status',
        'cancel_date',
		'cancel_person_type',
		'cancel_reason',
		'zoom_meeting_id',
		'zoom_meeting_pw',
		'zoom_meeting_url',
		'counseling_type',
		'price',
		'regist_id',
		'update_id'
	];

    public const counselingType = [
        [
            'label' => '一般企業',
            'id' => 0
        ],
        [
            'label' => '医院初回面談',
            'id' => 1
        ],
        [
            'label' => '医院二回目以降',
            'id' => 2
        ]
    ];

	public function tCounselingReserveNotice()
	{
		return $this->belongsTo(TCounselingReserveNotice::class, 'reserve_issue_id');
	}

	public function tSangyoiSchedule()
	{
		return $this->belongsTo(TSangyoiSchedule::class, 'sangyoi_schedule_id');
	}
}
