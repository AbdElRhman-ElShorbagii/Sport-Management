<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //
    protected $fillable=['name'];
    public  $timestamps=false;

    function players(){
        return $this->hasMany('App\Player');
    }

    function coatches(){
        return $this->hasMany('App\Coatch');
    }

    function  championshipEvent(){
       return $this->belongsToMany('App\ChampionshipEvent');
    }
    public static function rules(){
        return [
            'name' => 'required|unique:clubs|max:255',            
        ];
    }
}
