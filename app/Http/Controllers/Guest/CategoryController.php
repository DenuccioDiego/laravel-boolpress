<?php

namespace App\Http\Controllers\Guest;

use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        $posts = $category->posts()->orderByDesc('id')->paginate(5);
        return view('guest.posts.categories_posts', compact('posts', 'category'));
    }
}
