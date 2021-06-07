<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'contact';
    public $incrementing = true;
}