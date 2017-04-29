<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{

   // public $fillable = ['title','description'];
/*
   public function userspeak()
    {
        return $this->hasMany('App\Comment');
    }*/
public function user()
    {
        return $this->hasOne('App\User');
    }
}