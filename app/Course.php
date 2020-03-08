<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function students()
  {
    return $this->belongsToMany('App\Student')->withTimestamps();
  }

  public function teachers()
  {
    return $this->belongsToMany('App\Teacher')->withTimestamps();
  }
}
