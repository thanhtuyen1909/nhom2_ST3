<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $fillable = ['sub_title', 'title', 'description', 'status', 'filename'];
    protected $primaryKey = 'id';
    protected $table = 'banner';
    public $incrementing = true;
    public $timestamps = true;
}
