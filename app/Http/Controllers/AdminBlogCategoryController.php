<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class AdminBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategory::all();
        return view("admin.blog_category.index", compact("blogCategories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories'
        ]);

        $blogCategory = BlogCategory::create(['name' => $request->name, 'slug' => \Str::slug($request->name)]);
        return redirect()->route('blog-category.index')->with('success', 'Blog Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogCategory = BlogCategory::find($id);
        return view('admin.blog_category.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $blogCategory = BlogCategory::find($id);
        $blogCategory->update(['name' => $request->name, 'slug' => \Str::slug($request->name)]);
        return redirect()->route('blog-category.index')->with('success', 'Blog Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();
        return back()->with('success', 'Blog Category deleted successfully');
    }
}
