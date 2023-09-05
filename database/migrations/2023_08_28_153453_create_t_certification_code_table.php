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
        Schema::create('t_certification_code', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('sms_number', 11)->unique('t_certification_code_sms_number_key');
            $table->string('certification_code', 4)->unique('t_certification_code_certification_code_key');
            $table->string('certification_status', 1)->default('0')->comment('0:未認証、1:ログイン済');
            $table->timestampTz('created_at');
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
        Schema::dropIfExists('t_certification_code');
    }
};
