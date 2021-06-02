<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'Favourite';
    public $incrementing = true;
    public $timestamps = false;
    
    public function linkUser(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function linkFavouriteInfo(){
        return $this->hasMany('App\FavouriteInfo','id','id');
    }
}
