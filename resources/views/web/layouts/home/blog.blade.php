<div class="blog pt_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Latest News</h2>
                    <p>
                        Check out the latest news and updates from our blog post
                    </p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($blogPosts as $blogPost)
                
                <div class="col-lg-4 col-md-6">
                    <div class="item pb_70">
                        <div class="photo">
                            <img src="{{ asset('uploads/admin/blog_post'.$blogPost->image) }}" alt="" />
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


        </div>
    </div>
</div>
