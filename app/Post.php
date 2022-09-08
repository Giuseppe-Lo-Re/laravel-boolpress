<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    // creo la relazione con category  
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // creo la relazione con tags  
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
