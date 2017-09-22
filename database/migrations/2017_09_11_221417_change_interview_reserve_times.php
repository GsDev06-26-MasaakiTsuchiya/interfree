<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInterviewReserveTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interview_reserve_times', function (Blueprint $table) {
            $table->renameColumn('interview_reserve_time', 'reserve_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interview_reserve_times', function (Blueprint $table) {
            $table->renameColumn('reserve_time','interview_reserve_time');
        });
    }
}
