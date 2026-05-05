<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{

public function getRouteKeyName()
{
    return 'slug';
}

public function author() {
    return $this->belongsTo(Author::class);
}

public function categories(){
    return $this->belongsToMany(Category::class);
}
}
