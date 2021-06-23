<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'comment';
    protected $fillable = ['idUser', 'idSP', 'comment', 'parent_id', 'created_at'];
    public function linkUser(){
        return $this->belongsTo('App\User','idUser','id');
    }
    public function linkProduct(){
        return $this->belongsTo('App\Product','idSP','id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
