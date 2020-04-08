<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{    
    protected $fillable=['name'];
    public  $timestamps=false;
    function championship(){
        return $this->belongsToMany('App\Championship');
    }

    public static function rules(){
        return [
            'name' => 'required|unique:events|max:255',            
        ];
    }
}
