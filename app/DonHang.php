<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'donhang';
    public $incrementing = true;
}
