<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $redirectTo = '/home';

    protected $table = 'users';
    protected $primaryKey = 'id';

    public function linkComment(){
        return $this->hasMany('App\Comment','username','id');
    }
    public function linkProtype(){
        return $this->belongsTo('App\Role','type_id');
    }
    public function linkDonHangInfo(){
        return $this->hasMany('App\donhanginfo','username','id');
    } 
    public function linkCart(){
        return $this->hasOne('App\Cart_model','id','id');
    }
    public function linkFavourite(){
        return $this->hasOne('App\Favourite','id','id');
    } 
    public function linkRole(){
        return $this->belongsTo('App\Role','role_id','role_id');
    }
}
