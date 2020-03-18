<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function students()
  {
    return $this->belongsToMany('App\Student')->withTimestamps();
  }

  public function professors()
  {
    return $this->belongsToMany('App\Professor')->withTimestamps();
  }

  public function lectures(){
    return $this->hasMany('App\Lecture');
  }

  public function department(){
    return $this->belongsTo('App\Department');
  }

  public function level(){
    return $this->belongsTo('App\Level');
}
}
