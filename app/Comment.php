<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'comments';

    protected $fillable = [
        'content', 'author_id', 'email', 'url', 'post_id'
    ];

    public function authors(){
        return $this->belongsTo('App\Author');
    }

    public function posts(){
        return $this->belongsTo('App\Post');
    }
}
