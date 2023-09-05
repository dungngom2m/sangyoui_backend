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
        Schema::create('t_kihoninf_general', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('reserve_issue_id');
            $table->string('employee_no', 100);
            $table->integer('join_progress_year');
            $table->integer('join_progress_month');
            $table->string('company_name', 100);
            $table->string('department', 100)->nullable();
            $table->string('name', 100);
            $table->integer('age');
            $table->integer('sex');
            $table->integer('jikangai_workhour_lastmonth');
            $table->integer('kyujitsu_workhour_lastmonth');
            $table->integer('total_workhour_lastmonth');
            $table->integer('tukin_hour');
            $table->integer('tukin_min');
            $table->integer('jikangai_workhour_2month_hour');
            $table->integer('jikangai_workhour_2month_min');
            $table->integer('jikangai_workhour_3month_hour');
            $table->integer('jikangai_workhour_3month_min');
            $table->integer('suimin_hour_from');
            $table->integer('suimin_hour_to');
            $table->integer('suimin_hour_total');
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_kihoninf_general');
    }
};
