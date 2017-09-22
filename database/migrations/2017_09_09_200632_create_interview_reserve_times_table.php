<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewReserveTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_reserve_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corp_id')->unsigned()->index();
            $table->integer('interview_id')->unsigned()->index();
            $table->datetime('interview_reserve_time');
            $table->timestamps();
            
            $table->foreign('corp_id')->references('id')->on('corps');
            $table->foreign('interview_id')->references('id')->on('interviews');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_reserve_times');
    }
}
