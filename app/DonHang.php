<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'donhang';
    public $timestamps = false;
    public function linkDonHangInfo(){
        return $this->hasMany('App\DonHangInfo','idTTNH','id');
    }
}
