<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.tags_posts', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'name' => 'required|max:100|unique:tags'
        ]);

        $validate_data['slug'] = Str::slug($request->name);

        Tag::create($validate_data);

        return redirect()->back()->with('message', 'Tag created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validate_data = $request->validate([
            'name' => ['required', 'max:100', Rule::unique('tags')->ignore($tag->id)]
        ]);

        $validate_data['slug'] = Str::slug($request->name);

        $tag -> update($validate_data);

        return redirect()->back()->with('message', 'Tag changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('message', 'Tag deleted');
    }
}
