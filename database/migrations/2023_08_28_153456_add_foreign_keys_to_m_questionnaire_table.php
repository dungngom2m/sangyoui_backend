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
        Schema::table('m_questionnaire', function (Blueprint $table) {
            $table->foreign(['user_company_id'], 'm_questionnaire_user_company_id_fkey')->references(['id'])->on('m_user_company')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_questionnaire', function (Blueprint $table) {
            $table->dropForeign('m_questionnaire_user_company_id_fkey');
        });
    }
};
