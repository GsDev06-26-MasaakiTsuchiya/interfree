<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corp_id')->unsigned()->index();
            $table->integer('interview_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
            
            $table->foreign('corp_id')->references('id')->on('corps');
            $table->foreign('interview_id')->references('id')->on('interviews');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->unique(['user_id', 'interview_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lists');
    }
}
