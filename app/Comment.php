<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];
    
    function post(){
        return $this->belongsTo('App\Post');
    }
}

