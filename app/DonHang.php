<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'donhang';
    public $incrementing = true;
    public function linkCTDH(){
        return $this->hasMany('App\ChiTietDonHang','idDonHang','id');
    }
}
