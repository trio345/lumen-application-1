<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'posts';

    protected $fillable = [
        'title', 'content', 'tags', 'status', 'author_id'
    ];

    public function authors(){
        return $this->belongsTo('App\Author');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
