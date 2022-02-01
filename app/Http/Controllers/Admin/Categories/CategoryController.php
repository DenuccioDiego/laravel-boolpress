<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.categories_posts', compact('categories') );
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
            'name' => 'required|max:200|unique:categories'
        ]);

        $validate_data['slug'] = Str::slug($request->name);

        Category::create($validate_data);

        return redirect()->back()->with('message', 'Category created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validate_data = $request->validate([
            'name' => ['required', 'max:100', Rule::unique('categories')->ignore($category->id)]
        ]);

        $validate_data['slug'] = Str::slug($request->name);

        $category -> update($validate_data);

        return redirect()->back()->with('message', 'Category changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('message', 'Category deleted');
    }
}
