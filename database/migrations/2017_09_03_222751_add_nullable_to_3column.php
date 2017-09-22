<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableTo3column extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('department',64)->nullable()->change();
             $table->string('title',64)->nullable()->change();;             
             $table->text('user_profile')->nullable()->change();;
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
        Schema::table('users', function (Blueprint $table) {
             $table->string('department',64)->change();
             $table->string('title',64)->change();;             
             $table->text('user_profile')->change();;
            //
        });
    }
}
