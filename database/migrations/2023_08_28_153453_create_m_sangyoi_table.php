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
        Schema::create('m_sangyoi', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_company_id');
            $table->string('name', 100);
            $table->string('name_kana', 100);
            $table->date('birthday');
            $table->string('sex', 100);
            $table->string('post_number', 7);
            $table->string('todofuken', 100);
            $table->string('shikucyoson', 100);
            $table->string('tatemono', 100)->nullable();
            $table->string('heyabango', 100)->nullable();
            $table->integer('chiiki_cd');
            $table->string('shorui_flg', 1)->nullable();
            $table->string('shorui_post_number', 7)->nullable();
            $table->string('shorui_todofuken', 100)->nullable();
            $table->string('shorui_shikucyoson', 100)->nullable();
            $table->string('shorui_tatemono', 100)->nullable();
            $table->string('shorui_heyabango', 100)->nullable();
            $table->string('contact_mailaddr');
            $table->string('contact_telnumber', 11);
            $table->integer('shozoku_kbn');
            $table->string('shozoku', 100)->nullable();
            $table->string('shozoku_busho', 100)->nullable();
            $table->string('clinical_department', 100);
            $table->integer('keiyaku_kbn');
            $table->integer('kyuyo_kbn');
            $table->integer('price_1');
            $table->integer('price_2');
            $table->string('ginko_name', 100);
            $table->string('ginko_shiten_name', 100);
            $table->string('ginko_shiten_name_kana', 100);
            $table->string('koza_type', 1);
            $table->string('koza_name_kana', 100);
            $table->string('koza_number', 7);
            $table->string('invoice_number', 14)->nullable();
            $table->string('shousho_number', 100);
            $table->string('nihonishi_license_flg', 1)->default('0');
            $table->string('sangyoi_diploma_license_flg', 1)->default('0');
            $table->string('consultant_license_flg', 1)->default('0');
            $table->string('other_license_flg', 1)->default('0');
            $table->string('other_license_memo', 1000)->nullable();
            $table->integer('sangyoi_experience')->default(0)->comment('0:10年以上, 1:5年以上, 2:2年以上, 3:1年以上, 4:未経験');
            $table->integer('counseling_experience')->default(0)->comment('0:100件以上, 1:50件以上, 2:10件以上, 3:10件未満, 4:なし');
            $table->integer('clinical_experience')->default(0)->comment('0:10年以上, 1:5年以上, 2:2年以上, 3:1年以上, 4:未経験');
            $table->string('shousho_file_path', 1000);
            $table->string('memo', 1000)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('zoom_client_id', 23);
            $table->string('zoom_client_secret', 33);
            $table->string('zoom_mailaddr');
            $table->string('zoom_token', 256)->nullable();
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->string('token', 32)->nullable();
            $table->timestampTz('token_issued')->nullable();
            $table->string('zoom_account_id', 23);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_sangyoi');
    }
};
