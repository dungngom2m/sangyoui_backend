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
        Schema::create('t_report_general', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('reserve_issue_id');
            $table->string('report_status', 1)->default('0')->comment('1:完了');
            $table->integer('hirou_situation');
            $table->integer('kenko_situation');
            $table->string('kenko_situation_memo', 100)->nullable();
            $table->integer('shindan_kbn');
            $table->string('shindan_kbn_memo', 100)->nullable();
            $table->integer('syugyo_kbn');
            $table->integer('syugyo_kbn2_naiyo_kbn')->nullable();
            $table->string('syugyo_kbn2_naiyo_memo', 1000)->nullable();
            $table->integer('syugyo_kbn3_naiyo_kbn')->nullable();
            $table->integer('syugyo_kbn3a_hour')->nullable();
            $table->integer('syugyo_kbn3c_from_hour')->nullable();
            $table->integer('syugyo_kbn3c_from_min')->nullable();
            $table->integer('syugyo_kbn3c_to_hour')->nullable();
            $table->integer('syugyo_kbn3c_to_min')->nullable();
            $table->integer('syugyo_kbn4_naiyo_kbn')->nullable();
            $table->string('syugyo_kbn4_naiyo_memo', 1000)->nullable();
            $table->integer('syochi_kikan')->nullable();
            $table->integer('syochi_kikan_kbn')->nullable()->comment('0:日　1:週　2:月');
            $table->string('bikou', 1000)->nullable();
            $table->string('open_flg', 1)->default('0')->comment('1:参照済み');
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
        Schema::dropIfExists('t_report_general');
    }
};
