<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'amount', 'weight', 'description', 'information', 'feature', 'sale', 'type_id'];
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'products';
    public $incrementing = true;
    public function linkProtype(){
        return $this->belongsTo('App\Protype','type_id');
    } 
     public function linkComment(){
        return $this->hasMany('App\Comment', 'idSP', 'id');
    }
}
