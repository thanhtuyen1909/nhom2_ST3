<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'status_id';
    protected $fillable = ['status_tittle'];
    protected $table = 'status';
    public $timestamps = false;
    public function linkDonHang(){
        return $this->hasMany('App\DonHang','status','id');
    }
}