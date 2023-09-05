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
        Schema::create('t_working_time', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_code');
            $table->integer('client_id');
            $table->string('employee_number', 5);
            $table->string('year', 4);
            $table->string('month', 2);
            $table->integer('overtime_bef_month');
            $table->integer('overtime');
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->date('target_month')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_working_time');
    }
};
