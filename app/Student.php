<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
      return $this->belongsToMany('App\Course')->withTimestamps();
    }

    public function user() {
      return $this->morphOne('App\User', 'userable');
  }
  public function attendance(){
    return $this->hasMany('App\Attendance');
  }
}
