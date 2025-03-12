<div class="special pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-side">
                                <div class="inner">
                                    <h3>{{ $about->title }}</h3>
                                    <p>{{ $about->description }}</p>
                                    <div class="button-style-1 mt_20">
                                        <a href="{{ $about->button_link }}">{{ $about->button_text }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-side" style="background-image: url({{ asset('uploads/admin/about/'.$about->photo) }});">
                                <a class="video-button" href="{{ $about->video_links }}"><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>