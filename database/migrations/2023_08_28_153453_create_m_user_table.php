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
        Schema::create('m_user', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_id');
            $table->string('mailaddr');
            $table->string('name', 100);
            $table->string('name_kana', 100);
            $table->string('password', 99)->nullable();
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->string('token', 32)->nullable();
            $table->timestampTz('token_issued')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_user');
    }
};
