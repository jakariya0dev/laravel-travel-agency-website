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
                            <form action="{{ route('blog-post.update', $blogPost->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/admin/blog_post/'.$blogPost->image) }}" alt="" class="profile-photo w_100_p">
                                        <input type="file" class="mt_10" name="image">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Heading</label>
                                            <input value="{{ $blogPost->title }}" name="title" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Post Body</label>
                                            <input value="{{ $blogPost->content }}" name="content" type="text" class="form-control editor">
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ $blogPost->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $blogPost->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Blog Category</label>
                                            <select name="blog_category_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($blogCategories as $blogCategory)
                                                    <option value="{{ $blogCategory->id }}" {{ $blogPost->blog_category_id == $blogCategory->id ? 'selected' : '' }}>{{ $blogCategory->name }}</option>
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