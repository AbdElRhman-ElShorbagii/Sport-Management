<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Championship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('championships',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
        });

        Schema::create('events',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');            
        });

        Schema::create('championship_event',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('championship_id');                        
            $table->unsignedInteger('event_id');                        
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->foreign('championship_id')->references('id')->on('championships');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('events');
        Schema::dropIfExists('championships');
    }
}
