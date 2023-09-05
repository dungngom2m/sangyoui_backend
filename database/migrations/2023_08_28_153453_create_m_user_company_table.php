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
        Schema::create('m_user_company', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('user_company_name', 100)->nullable();
            $table->string('user_company_name_kana', 100)->nullable();
            $table->string('post_number', 7)->nullable();
            $table->string('todofuken', 100)->nullable();
            $table->string('shikucyoson', 100)->nullable();
            $table->string('tatemono', 100)->nullable();
            $table->string('heyabango', 100)->nullable();
            $table->string('tel_number', 13)->nullable();
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->string('fax_number', 13)->nullable();
            $table->string('invoice_number', 100)->nullable();
            $table->string('seikyu_tantosha', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_user_company');
    }
};
