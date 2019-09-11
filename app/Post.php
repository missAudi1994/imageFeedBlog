<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{


  
   protected $primaryKey = 'id';


   public function comments(){
        return $this->hasMany("App\Comment");
    }

  
    public function user(){
        return $this->belongsTo("App\User");
    }

     



   

}
