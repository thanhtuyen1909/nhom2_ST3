<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'comment';
    public $incrementing = true;
    public function linkUser(){
        return $this->belongsTo('App\User','username','id');
    }
    public function linkProduct(){
        return $this->belongsTo('App\User','idSP','id');
    }
}
