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
        Schema::table('t_sangyoi_schedule', function (Blueprint $table) {
            $table->foreign(['doctor_id'], 't_sangyoi_schedule_doctor_id_fkey')->references(['id'])->on('m_sangyoi')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_sangyoi_schedule', function (Blueprint $table) {
            $table->dropForeign('t_sangyoi_schedule_doctor_id_fkey');
        });
    }
};
