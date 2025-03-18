<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Str;

class AdminBlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogPosts = BlogPost::with('category')->get();
        return view('admin.blog_post.index', compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = BlogCategory::all();
        return view('admin.blog_post.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'blog_category_id'=> 'required',
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.strtolower($image->getClientOriginalExtension());
            $image->move(public_path('uploads/admin/blog_post'), $imageName);
        }

        BlogPost::create([
            'title'=> $request->title,
            'slug'=> Str::slug($request->title),
            'content'=> $request->content,
            'blog_category_id'=> $request->blog_category_id,
            'image'=> $imageName,
        ]);

        return redirect()->route('blog-post.index')->with('success','Successfully created blog post');
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
        $blogPost = BlogPost::with('category')->findOrFail($id);
        $blogCategories = BlogCategory::all();
        return view('admin.blog_post.edit', compact('blogPost', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    
    {
        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'blog_category_id'=> 'required',
            'status'=> 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);
        
        $blogPost = BlogPost::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.strtolower($image->getClientOriginalExtension());
            $image->move(public_path('uploads/admin/blog_post'), $imageName);

            if(file_exists(public_path('uploads/admin/blog_post/'.$blogPost->image))){
                unlink(public_path('uploads/admin/blog_post/'.$blogPost->image));
            } 
        }

        $blogPost->title = $request->title;
        $blogPost->slug = Str::slug($request->title);
        $blogPost->content = $request->content;
        $blogPost->blog_category_id = $request->blog_category_id;
        $blogPost->status = $request->status;
        $blogPost->image = $imageName;
        $blogPost->update();

        return redirect()->route('blog-post.index')->with('success','Successfully updated blog post');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        if(file_exists(public_path('uploads/admin/blog_post/'.$blogPost->image))){
            unlink(public_path('uploads/admin/blog_post/'.$blogPost->image));
        }
        $blogPost->delete();
        return redirect()->route('blog-post.index')->with('success','Successfully deleted blog post');
    }
}
