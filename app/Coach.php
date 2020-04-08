<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    //
    
    protected $fillable=['name','club_id'];
    public  $timestamps=false;

    function club(){
        return $this->belongsTo('App\Club');
    }
    
    function players(){
        return $this->hasMany('App\Player');
    }
 
    public static function rules(){
        return [
            'name' => 'required|unique:coaches|max:255',            
            'club_id' => 'required',
        ];
    }
}
