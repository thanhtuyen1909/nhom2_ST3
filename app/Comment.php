<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $table = 'comment';
    public $incrementing = true;
}
