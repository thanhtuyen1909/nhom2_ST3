<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'thongtinnhanhang';
    public $incrementing = true;
    public function linkProtype(){
        return $this->belongsTo('App\User','username','id');
    }
}
