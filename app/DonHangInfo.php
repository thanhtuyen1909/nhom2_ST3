<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHangInfo extends Model
{
    protected $table = 'donhanginfo';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = true;
    public function linkUser(){
        return $this->belongsTo('App\User','idUser','id');
    }
}
