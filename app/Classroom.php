<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'classroom_user', 'classroom_id', 'user_id');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
}
