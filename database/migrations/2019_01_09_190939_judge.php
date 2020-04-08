<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Judge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judges',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('championship_event_judge',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('championship_event_id');
            $table->unsignedInteger('judge_id');
            $table->smallInteger('position');
            $table->foreign('championship_event_id')->references('id')->on('championship_event');
            $table->foreign('judge_id')->references('id')->on('judges');



        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_event_judge');

        Schema::dropIfExists('judges');
        //
    }
}
