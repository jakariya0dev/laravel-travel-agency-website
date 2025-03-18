@extends('admin.layouts.master')

@section('content')

    {{-- Navbar --}}
        @include('admin.layouts.navbar')
        {{-- Navbar --}}

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')
        {{-- Sidebar --}}

     <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1>Add New Blog Post</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('blog-post.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/admin/'.auth()->guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                        <input type="file" class="mt_10" name="image" required>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Title</label>
                                            <input name="title" type="text" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Post Body</label>
                                            <input name="content" type="text" class="form-control editor">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Category</label>
                                            <select name="blog_category_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($blogCategories as $blogCategory)
                                                    <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection