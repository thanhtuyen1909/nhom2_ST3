<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'chitietdonhang';
    public $incrementing = true;
}
