<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // creo la relazione con posts  
    public function posts() {
        return $this->hasMany('App\Posts');
    }
}
