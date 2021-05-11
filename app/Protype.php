<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'type_id';
    protected $table = 'protypes';
    public $incrementing = true;
    public function linkProduct(){
        return $this->hasMany('App\Product','type_id','type_id');
    }
}
