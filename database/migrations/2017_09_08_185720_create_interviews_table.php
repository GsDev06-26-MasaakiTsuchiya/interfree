<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corp_id')->unsigned()->index();
            $table->integer('interview_type');
            $table->tinyInteger('interview_style');
            $table->integer('interviewee_id')->unsigned()->index();
            $table->dateTime('interview_date_time')->nullable();
            $table->tinyInteger('stage_flg');
            $table->text('t_r_reason')->nullable();
            $table->dateTime('fix_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('corp_id')->references('id')->on('corps');//外部キー設定
            $table->foreign('interviewee_id')->references('id')->on('interviewees');//外部キー設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
