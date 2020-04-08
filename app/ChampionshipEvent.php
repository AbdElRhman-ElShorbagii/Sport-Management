<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChampionshipEvent extends Model
{
    //
    function  club(){
        return $this->belongsToMany('App\Club');
    }
    function judge(){
        return $this->belongsToMany('App\Judge');
    }
    function player(){
        return $this->belongsToMany('App\Player');
    }
}
