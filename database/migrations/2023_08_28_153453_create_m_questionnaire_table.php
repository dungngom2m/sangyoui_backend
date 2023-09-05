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
        Schema::create('m_questionnaire', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_id');
            $table->integer('client_status');
            $table->integer('question_lev1_no');
            $table->integer('question_lev2_no');
            $table->string('question_title', 1000);
            $table->string('question_text', 1000);
            $table->string('answer_text_1', 100);
            $table->string('answer_text_2', 100)->nullable();
            $table->string('answer_text_3', 100)->nullable();
            $table->string('answer_text_4', 100)->nullable();
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->integer('answer_score_1')->nullable()->default(0);
            $table->integer('answer_score_2')->nullable()->default(0);
            $table->integer('answer_score_3')->nullable()->default(0);
            $table->integer('answer_score_4')->nullable()->default(0);

            $table->unique(['user_company_id', 'client_status', 'question_lev1_no', 'question_lev2_no'], 'm_questionnaire_user_company_id_client_status_question_lev1_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_questionnaire');
    }
};
