<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    public function getRouteKeyName()
    {
    return 'slug';
    }

    public function user() {
        return $this->belongsTo(User::class); 
    }

    public function articles(){
        return $this->hasMany(Article::class); 
    }
}
