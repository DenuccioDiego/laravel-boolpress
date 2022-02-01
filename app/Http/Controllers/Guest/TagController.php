<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function posts(Tag $tag)
    {
        $posts = $tag->posts()->orderByDesc('id')->paginate(5);
        return view('guest.posts.tags_posts', compact('posts', 'tag'));
    }
}
