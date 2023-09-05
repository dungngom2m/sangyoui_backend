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
        Schema::create('t_counseling_reserve', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('reserve_issue_id');
            $table->integer('sangyoi_schedule_id');
            $table->date('reserve_date');
            $table->timeTz('reserve_time_from');
            $table->timeTz('reserve_time_to');
            $table->integer('reserve_status')->comment('0:新規予約 1:遅刻 2:キャンセル');
            $table->integer('cancel_person_type')->nullable()->comment('0:従業員 1:産業医');
            $table->string('cancel_reason', 1000)->nullable();
            $table->string('zoom_meeting_id', 100);
            $table->string('zoom_meeting_pw', 100);
            $table->string('zoom_meeting_url', 1000);
            $table->integer('counseling_type');
            $table->integer('price');
            $table->string('regist_id', 100);
            $table->timestampTz('created_at');
            $table->string('update_id', 100);
            $table->timestampTz('updated_at');
            $table->softDeletesTz();
            $table->date('cancel_date')->nullable();
            $table->integer('cancel_delay_kbn')->nullable()->comment('0:キャンセル 1:遅刻');
            $table->integer('cancel_reason_kbn')->nullable()->comment('0:急患発生 1:他医師欠勤 2:体調不良 3:その他');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_counseling_reserve');
    }
};
