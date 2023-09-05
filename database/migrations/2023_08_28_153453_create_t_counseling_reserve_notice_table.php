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
        Schema::create('t_counseling_reserve_notice', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_id');
            $table->integer('client_id');
            $table->string('employee_id', 5);
            $table->date('target_month');
            $table->date('notice_date');
            $table->integer('implementation_status')->default(0)->comment('0:セルフチェック回答待ち、1:面談実施待ち、2:意見書提出待ち、3:意見書確認中、4:意見書提出済、5:クライアント確認済、9:キャンセル、');
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
        Schema::dropIfExists('t_counseling_reserve_notice');
    }
};
