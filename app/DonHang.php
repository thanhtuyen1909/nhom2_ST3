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
    public function linkUser(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function linkStatus(){
        return $this->belongsTo('App\Status','status','status_id');
    }
}
