<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('corp_name', 64);
            $table->string('address', 128);
            $table->string('tel', 64);
            $table->string('corp_url',255);
            $table->string('corp_mail',255);
            $table->tinyInteger('profile_flg')->unsigned()->default(1);
            $table->tinyInteger('info_text_flg')->unsigned()->default(1);
            $table->tinyInteger('info_photo_flg')->unsigned()->default(1);
            $table->tinyInteger('info_pdf_flg')->unsigned()->default(1);
            $table->tinyInteger('info_video_flg')->unsigned()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corps');
    }
}
