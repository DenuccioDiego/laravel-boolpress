<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->orderby('id', 'desc')->paginate(5);
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_post = $request->validate([
            'title' => 'required|max:100|unique:posts',
            'image' => 'nullable|url|max:200',
            'sub_title' => 'nullable|max:200',
            'description' => 'nullable|max:800', 
            'category_id' => 'nullable|exists:categories,id',
            'user_id' => Auth::id(),   
        ]);

        $new_post['slug'] = Str::slug($new_post['title']); 

        Post::create($new_post);

        return redirect()->route('admin.posts.show', $new_post['slug'])->with('message', "Hai creato il nuovo post: $new_post[title]");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (Auth::id() === $post->user_id){
            return view('admin.posts.show', compact('post'));
        } else {
            abort(403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    { 
        $categories = Category::all();
        if (Auth::id() === $post->user_id){
            return view('admin.posts.edit', compact('post','categories'));
        } else {
            abort(403);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() === $post->user_id){
            $new_post = $request->validate([
                'title' => ['required', 'max:100', Rule::unique('posts')->ignore($post->id)],
                'image' => 'nullable|url|max:200',
                'sub_title' => 'nullable|max:200',
                'description' => 'nullable|max:800',
                'category_id' => 'nullable|exists:categories,id', 
                'user_id' => Auth::id(),    
            ]);
    
            $new_post['slug'] = Str::slug($new_post['title']); 
            
            $post->update($new_post);
    
            return redirect()->route('admin.posts.show', $post['slug'])->with('message', "Hai modificato il post: $post[title]");

        } else {
            abort(403);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() === $post->user_id){
            $post->delete();

            return redirect()->back()->with('message', "Hai cancellato il post: $post[title]");
        } else {
            abort(403);
        }
        
    }
}
