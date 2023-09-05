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
        Schema::create('m_client', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_id');
            $table->string('client_code', 5);
            $table->integer('client_status')->comment('0:病院・医院、1:その他企業');
            $table->date('keiyaku_date')->nullable();
            $table->string('client_name', 100);
            $table->string('client_name_kana', 100);
            $table->string('post_number', 7);
            $table->string('todofuken', 100);
            $table->string('chikucyoson', 100);
            $table->string('tatemono', 100)->nullable();
            $table->string('heyabango', 100)->nullable();
            $table->string('tel_number', 13);
            $table->string('manager_name_1', 100);
            $table->string('manager_name_kana_1', 100);
            $table->string('manager_mailaddr_1', 100);
            $table->string('manager_contact_telnumber_1', 13);
            $table->string('manager_name_2', 100)->nullable();
            $table->string('manager_name_kana_2', 100)->nullable();
            $table->string('manager_mailaddr_2', 100)->nullable();
            $table->string('manager_contact_telnumber_2', 13)->nullable();
            $table->string('manager_name_3', 100)->nullable();
            $table->string('manager_name_kana_3', 100)->nullable();
            $table->string('manager_mailaddr_3', 100)->nullable();
            $table->string('manager_contact_telnumber_3', 13)->nullable();
            $table->string('manager_name_4', 100)->nullable();
            $table->string('manager_name_kana_4', 100)->nullable();
            $table->string('manager_mailaddr_4', 100)->nullable();
            $table->string('manager_contact_telnumber_4', 13)->nullable();
            $table->string('manager_name_5', 100)->nullable();
            $table->string('manager_name_kana_5', 100)->nullable();
            $table->string('manager_mailaddr_5', 100)->nullable();
            $table->string('manager_contact_telnumber_5', 13)->nullable();
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->string('api_key', 1000)->nullable();
            $table->integer('overtime_border');
            $table->integer('chiiki_cd');
            $table->integer('base_price_fixed')->default(0);
            $table->integer('base_price_paruse')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_client');
    }
};
