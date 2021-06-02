<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_model extends Model
{
    protected $primaryKey = 'idCart';
    protected $table = 'cart';
    public $incrementing = true;
    public $timestamps = false;
    
    public function linkUser(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function linkCartInfo(){
        return $this->hasMany('App\CartInfo','id','id');
    }
}
