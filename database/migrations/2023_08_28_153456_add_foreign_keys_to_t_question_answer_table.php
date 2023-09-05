<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_question_answer', function (Blueprint $table) {
            $table->foreign(['reserve_issue_id'], 't_question_answer_reserve_issue_id_fkey')->references(['id'])->on('t_counseling_reserve_notice')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_company_id', 'client_status', 'question_lev1_no', 'question_lev2_no'], 't_question_answer_user_company_id_client_status_question_l_fkey')->references(['user_company_id', 'client_status', 'question_lev1_no', 'question_lev2_no'])->on('m_questionnaire')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_question_answer', function (Blueprint $table) {
            $table->dropForeign('t_question_answer_reserve_issue_id_fkey');
            $table->dropForeign('t_question_answer_user_company_id_client_status_question_l_fkey');
        });
    }
};
