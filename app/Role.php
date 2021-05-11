<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'role_id';
    protected $table = 'roles';
    public $incrementing = true;
    public function linkUser(){
        return $this->hasMany('App\User','role_id','id');
    }
}
