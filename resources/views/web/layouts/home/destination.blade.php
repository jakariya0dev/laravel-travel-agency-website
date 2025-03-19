<div class="destination pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Popular Destinations</h2>
                    <p>
                        Explore our most popular travel destinations around the world
                    </p>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach ($popularDestinations as $popularDestination)
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_25">
                        <div class="photo">
                            <a href="destination.html">
                                <img src="{{ asset('uploads/admin/destination/'.$popularDestination->featured_photo) }}" alt="">
                            </a>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="destination.html"> {{ $popularDestination->name }} </a>
                            </h2>
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="see-more">
                    <div class="button-style-1 mt_20">
                        <a href="{{ route('destinations') }}">View All Destinations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
