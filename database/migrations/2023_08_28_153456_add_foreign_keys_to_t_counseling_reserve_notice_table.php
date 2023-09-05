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
        Schema::table('t_counseling_reserve_notice', function (Blueprint $table) {
            $table->foreign(['user_company_id', 'client_id', 'employee_id'], 't_counseling_reserve_notice_user_company_id_client_id_empl_fkey')->references(['user_company_id', 'client_id', 'employee_number'])->on('m_client_employee')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_counseling_reserve_notice', function (Blueprint $table) {
            $table->dropForeign('t_counseling_reserve_notice_user_company_id_client_id_empl_fkey');
        });
    }
};
