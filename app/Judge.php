<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    //
    
    function  championshipEvent(){
        return $this->belongsToMany('App\ChampionshipEvent');
    }
}
