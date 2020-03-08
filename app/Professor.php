<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public function courses()
    {
      return $this->belongsToMany('App\Course')->withTimestamps();
    }
}
