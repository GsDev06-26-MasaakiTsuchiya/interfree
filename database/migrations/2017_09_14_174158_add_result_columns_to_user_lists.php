<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResultColumnsToUserLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_lists', function (Blueprint $table) {
            $table->tinyInteger('score_0')->nullable();
            $table->tinyInteger('score_1')->nullable();
            $table->tinyInteger('score_2')->nullable();
            $table->tinyInteger('score_3')->nullable();
            $table->tinyInteger('score_4')->nullable();
            $table->tinyInteger('score_5')->nullable();
            $table->text('qualitative_0')->nullable();
            $table->text('qualitative_1')->nullable();
            $table->text('qualitative_2')->nullable();
            $table->text('qualitative_3')->nullable();
            $table->text('qualitative_4')->nullable();
            $table->text('qualitative_5')->nullable();
            $table->text('comment')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_lists', function (Blueprint $table) {
                        $table->tinyInteger('score_0')->nullable();
            $table->dropColumn('score_0')->nullable();
            $table->dropColumn('score_1')->nullable();
            $table->dropColumn('score_2')->nullable();
            $table->dropColumn('score_3')->nullable();
            $table->dropColumn('score_4')->nullable();
            $table->dropColumn('score_5')->nullable();
            $table->dropColumn('qualitative_0')->nullable();
            $table->dropColumn('qualitative_1')->nullable();
            $table->dropColumn('qualitative_2')->nullable();
            $table->dropColumn('qualitative_3')->nullable();
            $table->dropColumn('qualitative_4')->nullable();
            $table->dropColumn('qualitative_5')->nullable();
            $table->dropColumn('comment')->nullable();
            
            
        });
    }
}
