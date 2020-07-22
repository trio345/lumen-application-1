<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'authors';

    protected $fillable = [
        'username', 'password', 'salt', 'email', 'profile'
    ];


    public function posts(){
        return $this->hasMany('App\Post', 'author_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'author_id', 'id');
    }
}
