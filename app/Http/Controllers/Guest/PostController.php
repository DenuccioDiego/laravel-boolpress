<?php

namespace App\Http\Controllers\Guest;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ddd(Post::all());

        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('id', 'desc')->paginate(6);

        return view('guest.posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //ddd($post->tags);
        return view('guest.posts.show', compact('post'));
    }
}
