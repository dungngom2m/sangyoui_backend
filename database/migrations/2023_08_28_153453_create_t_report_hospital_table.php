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
        Schema::create('t_report_hospital', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('reserve_issue_id');
            $table->string('report_status', 1)->default('0')->comment('1:完了');
            $table->string('work_situation', 1000)->nullable();
            $table->integer('suimin_situation')->default(0);
            $table->string('suimin_situation_memo', 1000)->nullable();
            $table->integer('hirou_situation')->default(0);
            $table->string('hirou_situation_memo', 1000)->nullable();
            $table->string('other_memo', 1000)->nullable();
            $table->string('syugyo_taisyo_fuyo_flg', 1)->default('0');
            $table->string('shinshin_keizoku_flg', 1)->default('0');
            $table->string('shinshin_keizoku_memo', 1000)->nullable();
            $table->string('shinshin_jushin_flg', 1)->default('0');
            $table->string('shinshin_jushin_memo', 1000)->nullable();
            $table->string('shinshin_renkei_flg', 1)->default('0');
            $table->string('shinshin_renkei_memo', 1000)->nullable();
            $table->string('shinshin_other_flg', 1)->default('0');
            $table->string('shinshin_other_memo', 1000)->nullable();
            $table->string('kinmujokyo_1_flg', 1)->default('0');
            $table->string('kinmujokyo_2_flg', 1)->default('0');
            $table->string('kinmujokyo_other_flg', 1)->default('0');
            $table->string('kinmujokyo_other_memo', 1000)->nullable();
            $table->string('tokki_memo', 1000)->nullable();
            $table->string('mensetsu_ishi_shozoku', 100)->nullable();
            $table->string('sangyoi_iken', 1000)->nullable();
            $table->date('iken_update_date')->nullable();
            $table->string('iken_update_person_name', 100)->nullable();
            $table->string('sochi_naiyo', 1000)->nullable();
            $table->date('sochi_update_date')->nullable();
            $table->string('iryokikan_name', 100)->nullable();
            $table->string('kanrisha_name', 100)->nullable();
            $table->string('jigyosha_name', 100)->nullable();
            $table->string('open_flg', 1)->default('0');
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
        Schema::dropIfExists('t_report_hospital');
    }
};
