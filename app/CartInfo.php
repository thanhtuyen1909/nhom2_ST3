<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartInfo extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'cartinfo';
    public $incrementing = true;    
    public $timestamps = false;

    public function linkCart(){
        return $this->belongsTo('App/Cart_model','idCart','id');
    }
    public function linkProduct(){
        return $this->belongsTo('App/Product','idProduct','id');
    }
}
