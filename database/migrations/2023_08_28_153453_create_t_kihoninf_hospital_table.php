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
        Schema::create('t_kihoninf_hospital', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('reserve_issue_id');
            $table->string('hospital_name', 100);
            $table->string('department', 100);
            $table->string('employee_no', 100);
            $table->string('name', 100);
            $table->string('name_kana', 100);
            $table->integer('birthday_year');
            $table->integer('birthday_month');
            $table->integer('birthday_day');
            $table->integer('sex');
            $table->integer('jikangai_kbn_lastmonth')->default(0);
            $table->string('interval_low9_flg_lastmonth', 1)->default('0');
            $table->string('interval_low18_flg_lastmonth', 1)->default('0');
            $table->integer('jikangai_kbn')->default(0);
            $table->string('interval_low9_flg', 1)->default('0');
            $table->string('interval_low18_flg', 1)->default('0');
            $table->integer('busy_kbn')->default(0);
            $table->integer('oncall_cnt');
            $table->integer('tocyoku_cnt');
            $table->integer('niccyoku_cnt');
            $table->integer('tukin_hour');
            $table->integer('tukin_min');
            $table->integer('tukin_kbn')->default(0);
            $table->integer('fukugyo_hour')->nullable();
            $table->integer('fukugyo_tukin_hour')->nullable();
            $table->integer('fukugyo_tukin_min')->nullable();
            $table->integer('suimin_hour_wd_kbn')->default(0);
            $table->integer('suimin_hour_hd_kbn')->default(0);
            $table->integer('kisyo_diff_hour_kbn')->default(0);
            $table->integer('holiday_cnt_lastmonth')->nullable();
            $table->string('holiday_cnt_fumei_flg', 1)->default('0');
            $table->integer('yukyu_kbn')->default(0);
            $table->string('doctor_fusoku_flg', 1)->default('0');
            $table->string('kodo_gyomu_flg', 1)->default('0');
            $table->string('study_none_flg', 1)->default('0');
            $table->string('fukugyo_need_flg', 1)->default('0');
            $table->string('doctor_com_flg', 1)->default('0');
            $table->string('no_doctor_com_flg', 1)->default('0');
            $table->string('other_flg_9', 1)->default('0');
            $table->string('other_memo_9', 100)->nullable();
            $table->string('ryoritsu_flg', 1)->default('0');
            $table->string('kyoyo_flg', 1)->default('0');
            $table->string('koreisya_kaigo_flg', 1)->default('0');
            $table->string('byonin_kaigo_flg', 1)->default('0');
            $table->string('tukin_long_flg', 1)->default('0');
            $table->string('other_flg_10', 1)->default('0');
            $table->string('other_memo_10', 100)->nullable();
            $table->integer('chiryo_kbn')->default(0);
            $table->string('chiryo_memo', 1000)->nullable();
            $table->integer('sochi_kbn')->default(0);
            $table->integer('insyu_kbn')->default(0);
            $table->integer('kitsuen_kbn')->default(0);
            $table->string('tokki_none_flg', 1)->default('0');
            $table->string('sleepy_flg', 1)->default('0');
            $table->string('fat_flg', 1)->default('0');
            $table->string('other_flg_12', 1)->default('0');
            $table->string('other_memo_12', 100)->nullable();
            $table->string('memo', 1000)->nullable();
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
        Schema::dropIfExists('t_kihoninf_hospital');
    }
};
