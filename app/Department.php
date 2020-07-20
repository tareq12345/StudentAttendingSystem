<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $fillable = ['department'];
    public function courses(){
        return $this->hasMany('App\Course');
      }
}
