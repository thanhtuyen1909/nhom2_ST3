<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteInfo extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'favouriteinfo';
    public $incrementing = true;
    public $timestamps = false;
    
    public function linkFavourite(){
        return $this->hasMany('App\Favourite','id','id');
    }
}
