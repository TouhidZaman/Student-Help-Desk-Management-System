<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function subjects(){
        return $this->hasMany('App\Subject');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function classrooms(){
        return $this->hasMany('App\Classroom');
    }
}
