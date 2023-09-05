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
 * Class MQuestionnaire
 *
 * @property int $id
 * @property int $user_company_id
 * @property int $client_status
 * @property int $question_lev1_no
 * @property int $question_lev2_no
 * @property string $question_title
 * @property string $question_text
 * @property string $answer_text_1
 * @property string|null $answer_text_2
 * @property string|null $answer_text_3
 * @property string|null $answer_text_4
 * @property string $regist_id
 * @property Carbon $created_at
 * @property string $update_id
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $answer_score_1
 * @property int $answer_score_2
 * @property int $answer_score_3
 * @property int $answer_score_4
 *
 * @property MUserCompany $mUserCompany
 * @property Collection|TQuestionAnswer[] $tQuestionAnswers
 *
 * @package App\Models
 */
class MQuestionnaire extends Model
{
	use SoftDeletes;
	protected $table = 'm_questionnaire';

	protected $casts = [
		'id' => 'int',
		'user_company_id' => 'int',
		'client_status' => 'int',
		'question_lev1_no' => 'int',
		'question_lev2_no' => 'int',
		'answer_score_1' => 'int',
		'answer_score_2' => 'int',
		'answer_score_3' => 'int',
		'answer_score_4' => 'int'
	];

	protected $fillable = [
		'user_company_id',
		'client_status',
		'question_lev1_no',
		'question_lev2_no',
		'question_title',
		'question_text',
		'answer_text_1',
		'answer_text_2',
		'answer_text_3',
		'answer_text_4',
		'regist_id',
		'update_id',
		'answer_score_1',
		'answer_score_2',
		'answer_score_3',
		'answer_score_4'
	];

	public function mUserCompany()
	{
		return $this->belongsTo(MUserCompany::class, 'user_company_id');
	}

	public function t_question_answers()
	{
		return $this->hasMany(TQuestionAnswer::class)
                    ->where('user_company_id', $this->user_company_id)
                    ->where('client_status', $this->client_status)
                    ->where('question_lev1_no', $this->question_lev1_no)
                    ->where('question_lev2_no', $this->question_lev2_no);
	}
}
