<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // change table name in 'database'
    protected $table = 'posts';
    // Primary key
    public $primarKey = 'id';
    // change timestamp
    public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }

}
