<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class P extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_event_player',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('championship_event_id');
            $table->unsignedInteger('coach_id');
            $table->unsignedInteger('club_id');
            $table->unsignedInteger('player_id');
            $table->float('result');
            $table->smallInteger('prize');
            $table->foreign('championship_event_id')->references('id')->on('championship_event');
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('coach_id')->references('id')->on('coaches');
            $table->foreign('club_id')->references('id')->on('clubs');



        });
        Schema::create('championship_event_club',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('championship_event_id');
            $table->unsignedInteger('club_id');
            $table->foreign('championship_event_id')->references('id')->on('championship_event');
            $table->foreign('club_id')->references('id')->on('clubs');



        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_event_club');
        Schema::dropIfExists('championship_event_player');
    }
}
