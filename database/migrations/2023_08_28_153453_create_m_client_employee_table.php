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
        Schema::create('m_client_employee', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_id');
            $table->integer('client_id');
            $table->string('employee_number', 5);
            $table->string('name', 100);
            $table->string('name_kana', 100);
            $table->string('employee_type', 100);
            $table->string('busho', 100);
            $table->string('yakushoku', 100);
            $table->string('manager_id_1', 100);
            $table->string('manager_name_1', 100);
            $table->string('manager_id_2', 100)->nullable();
            $table->string('manager_name_2', 100)->nullable();
            $table->string('manager_id_3', 100)->nullable();
            $table->string('manager_name_3', 100)->nullable();
            $table->string('manager_id_4', 100)->nullable();
            $table->string('manager_name_4', 100)->nullable();
            $table->string('manager_id_5', 100)->nullable();
            $table->string('manager_name_5', 100)->nullable();
            $table->date('nyusha_date');
            $table->char('sex', 1);
            $table->string('sms_number', 11);
            $table->string('mailaddr')->nullable();
            $table->date('kenkoshindankekka_update_date')->nullable();
            $table->string('kenkoshindankekka_filepath', 1000)->nullable();
            $table->date('retirement_date')->nullable();
            $table->char('retirement_flg', 1)->default('0');
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->string('jigyosho', 100);
            $table->string('token', 8)->nullable();

            $table->unique(['user_company_id', 'client_id', 'employee_number'], 'm_client_employee_user_company_id_client_id_employee_number_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_client_employee');
    }
};
