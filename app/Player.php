<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    function club(){
        return $this->belongsTo('App\Club');
    }
    
    function coatch(){
        return $this->belongsTo('App\Coatch');
    }

    function championshipEvent(){
        return $this->belongsToMany('App\ChampionshipEvent');
    }
}
