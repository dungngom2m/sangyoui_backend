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
        Schema::table('m_client_employee', function (Blueprint $table) {
            $table->foreign(['client_id'], 'm_client_employee_client_id_fkey')->references(['id'])->on('m_client')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_company_id'], 'm_client_employee_user_company_id_fkey')->references(['id'])->on('m_user_company')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_client_employee', function (Blueprint $table) {
            $table->dropForeign('m_client_employee_client_id_fkey');
            $table->dropForeign('m_client_employee_user_company_id_fkey');
        });
    }
};
