<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TQuestionAnswer
 *
 * @property int $id
 * @property int $reserve_issue_id
 * @property int $user_company_id
 * @property int $client_status
 * @property string $question_title
 * @property int $question_lev1_no
 * @property int $question_lev2_no
 * @property string $question_text
 * @property string $answer_text
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $answer_score
 *
 * @property TCounselingReserveNotice $tCounselingReserveNotice
 * @property MQuestionnaire $mQuestionnaire
 *
 * @package App\Models
 */
class TQuestionAnswer extends Model
{
	use SoftDeletes;
	protected $table = 't_question_answer';

	protected $casts = [
		'id' => 'int',
		'reserve_issue_id' => 'int',
		'user_company_id' => 'int',
		'client_status' => 'int',
		'question_lev1_no' => 'int',
		'question_lev2_no' => 'int',
        'answer_score' => 'int'
	];

	protected $fillable = [
		'reserve_issue_id',
		'user_company_id',
		'client_status',
		'question_title',
		'question_lev1_no',
		'question_lev2_no',
		'question_text',
		'answer_text',
		'regist_id',
		'update_id',
        'answer_score'
	];

	public function tCounselingReserveNotice()
	{
		return $this->belongsTo(TCounselingReserveNotice::class, 'reserve_issue_id');
	}

	public function m_questionnaire()
	{
		return $this->belongsTo(MQuestionnaire::class)
                    ->where('user_company_id', $this->user_company_id)
                    ->where('client_status', $this->client_status)
                    ->where('question_lev1_no', $this->question_lev1_no)
                    ->where('question_lev2_no', $this->question_lev2_no);
	}
}
