<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToInterviewees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviewees', function (Blueprint $table) {
             $table->integer('corp_id')->unsigned()->index();
             $table->string('name_kana',64);
             $table->integer('job_post_id')->unsigned();
             $table->date('birthday')->nullable();
             $table->tinyInteger('sex');
             $table->string('post_code',64)->nullable();
             $table->text('address')->nullable();
             $table->string('github',255)->nullable();
             $table->string('portfolio',255)->nullable();
             $table->text('motivation')->nullable();
             $table->tinyInteger('channel');
             $table->softDeletes();
             
             $table->foreign('corp_id')->references('id')->on('corps');//外部キー設定
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interviewees', function (Blueprint $table) {
            $table->dropColumn(['corp_id','name_kana','job_post_id','sex','post_code','address','github','portfolio','motivation']);
        });
    }
}
