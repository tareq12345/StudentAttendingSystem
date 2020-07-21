<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
  protected $fillable = ['level'];
    public function courses(){
        return $this->hasMany('App\Course');
      }
}
