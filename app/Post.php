<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

    // creo la relazione con category  
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
