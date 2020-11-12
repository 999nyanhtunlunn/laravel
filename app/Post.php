<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public function user(){
    	return $this->belongsTo('App\User');
    }

     // category function
    public function category(){
    return $this->belongsTo('App\Category');
    }

    public function images(){
    return $this->hasmany('App\Image');
    }
}
