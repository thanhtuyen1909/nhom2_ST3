<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'chitietdonhang';
    public $incrementing = true;
    public function linkProduct(){
        return $this->belongsTo('App\Product','idSP','id');
    }
}
