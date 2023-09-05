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
        Schema::table('t_report_hospital', function (Blueprint $table) {
            $table->foreign(['reserve_issue_id'], 't_report_hospital_reserve_issue_id_fkey')->references(['id'])->on('t_counseling_reserve_notice')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_report_hospital', function (Blueprint $table) {
            $table->dropForeign('t_report_hospital_reserve_issue_id_fkey');
        });
    }
};
