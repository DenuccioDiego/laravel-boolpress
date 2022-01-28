<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'sub_title', 'description'];

    /**
        * Get the route key for the model.
        *
        * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
