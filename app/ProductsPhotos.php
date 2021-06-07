<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsPhotos extends Model
{
    protected $fillable = ['product_id', 'filename', 'photo_feature'];
    public $timestamps = true;
    protected $primaryKey = 'photo_id';
    public $incrementing = true;

    public function linkProduct()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
