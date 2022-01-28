<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    public funtion category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

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
