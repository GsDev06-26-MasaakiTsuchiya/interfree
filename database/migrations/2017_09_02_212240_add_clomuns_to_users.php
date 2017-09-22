<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClomunsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->integer('corp_id')->unsigned()->index();
             $table->string('department',64);
             $table->string('title',64);             
             $table->text('user_profile');
             $table->string('user_img')->nullable();
             $table->string('user_video')->nullable();
             $table->tinyInteger('kanri_flg');
             $table->tinyInteger('life_flg');
             $table->softDeletes();
             
             $table->foreign('corp_id')->references('id')->on('corps');//外部キー設定
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['corp_id', 'department', 'title', 'user_profile', 'user_img', 'user_video', 'kanri_flg', 'life_flg']);
            //
        });
    }
}
