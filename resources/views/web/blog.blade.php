
 @extends('web.layouts.master')

@section('main-content')

        <div class="page-top" style="background-image: url('uploads/banner.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Blog</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog pt_70 pb_70">
            <div class="container">
                <div class="row">

                    @if ($blogPosts)
                        @foreach ($blogPosts as $blogPost)
                            <div class="col-lg-4 col-md-6">
                                <div class="item pb_70">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/admin/blog_post/'.$blogPost->image) }}" alt="" />
                                    </div>
                                    <div class="text">
                                        <h2>
                                            <a href="post.html">{{ $blogPost->title }}</a>
                                        </h2>
                                        <div class="short-des">
                                            <p>
                                                {{ $blogPost->content }}
                                            </p>
                                        </div>
                                        <div class="button-style-2 mt_20">
                                            <a href="{{ route('blog.post', ['id' => $blogPost->id, 'slug' => $blogPost->slug]) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                    
                </div>
            </div>
        </div>

@endsection