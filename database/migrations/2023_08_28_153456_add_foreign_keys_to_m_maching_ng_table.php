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
        Schema::table('m_maching_ng', function (Blueprint $table) {
            $table->foreign(['client_id'], 'm_maching_ng_client_id_fkey')->references(['id'])->on('m_client')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['sangyoi_id'], 'm_maching_ng_sangyoi_id_fkey')->references(['id'])->on('m_sangyoi')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_maching_ng', function (Blueprint $table) {
            $table->dropForeign('m_maching_ng_client_id_fkey');
            $table->dropForeign('m_maching_ng_sangyoi_id_fkey');
        });
    }
};
