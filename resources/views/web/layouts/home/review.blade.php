<div class="testimonial pt_70 pb_70" style="background-image: url('{{ asset('uploads/web/testimonial-bg.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Client Testimonials</h2>
                <h3 class="sub-header">
                    See what our clients have to say about their experience with us
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    
                    
                    @foreach ($reviews as $review)

                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('uploads/admin/review/'.$review->photo) }}" alt="" />
                            </div>
                            <div class="text">
                                <h4>{{ $review->name }}</h4>
                                <p>{{ $review->designation }}</p>
                            </div>
                            <div class="quote">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="description">
                                <p>{{ $review->comment }}</p>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
