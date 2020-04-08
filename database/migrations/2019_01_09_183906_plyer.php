<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plyer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('club_id');
            $table->string('name');
            $table->foreign('club_id')->references('id')->on('clubs');
        });
        Schema::create('players',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('coach_id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('ssn')->unique();
            $table->unsignedInteger('club_id');
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('coach_id')->references('id')->on('coaches');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        Schema::dropIfExists('players');
                Schema::dropIfExists('coaches');

        //
    }
}
