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
        Schema::create('t_sangyoi_schedule', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('doctor_id');
            $table->date('schedule_date');
            $table->timeTz('schedule_time_from')->comment('開始～30分枠のスケジュールと扱う');
            $table->char('reserved_flg', 1)->default('0');
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
        Schema::dropIfExists('t_sangyoi_schedule');
    }
};
