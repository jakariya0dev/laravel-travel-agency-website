<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Faq;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function faqPageView()
    {
        $faqs = Faq::get();
        return view('web.faq', compact('faqs'));
    }

    public function blogPageView()
    {
        $blogPosts = BlogPost::with('category')->latest()->paginate(6);
        return view('web.blog', compact('blogPosts'));
    }

    public function blogPostPageView($id, $slug)
    {
        $blogPost = BlogPost::with('category')->findOrFail($id);

        $categories = BlogCategory::get();

        $latestPosts = BlogPost::with('category')->latest()->take(5)->get();

        return view('web.post', compact('blogPost', 'categories', 'latestPosts'));
    }

    public function blogBycategory($id){
        $blogPosts = BlogPost::with('category')->where('id', $id)->get();
        return view('web.blog', compact('blogPosts'));
    }
}
