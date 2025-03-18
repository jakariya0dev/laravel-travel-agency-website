    @extends('web.layouts.master')   

    @section('main-content')
    
        <div class="page-top" style="background-image: url('{{ asset('uploads/admin/') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $blogPost->title }}</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blogs</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="post pt_50 pb_50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="left-item">
                            <div class="main-photo">
                                <img src="{{ asset('uploads/admin/blog_post/'.$blogPost->image) }}" alt="">
                            </div>
                            <div class="sub">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i> {{ $blogPost->updated_at->format('d M, Y') }}</li>
                                    <li><i class="fas fa-th-large"></i> Category: <a href="">{{ $blogPost->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="description">
                                {!! $blogPost->content !!}
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="right-item">
                            <h2>Latest Posts</h2>
                            <ul>
                                @foreach ($latestPosts as $latestPost)
                                    <li>
                                        <a href="{{ route('blog.post', ['id' => $latestPost->id, 'slug' => $latestPost->slug]) }}"><i class="fas fa-angle-right">
                                            </i> {{ $latestPost->title }}
                                        </a>
                                    </li>

                                @endforeach
                            </ul>

                            <h2 class="mt_40">Categories</h2>
                            <ul>

                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('blog.category', $category->id) }}">
                                            <i class="fas fa-angle-right"></i> {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
 
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @endsection

        

        

