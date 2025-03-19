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
            <h1>Add New Slider</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('destinations.update', $destination->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <img src="{{ asset('uploads/admin/sliders/'.$destination->featured_photo) }}" alt="" class="profile-photo w_100_p">
                                            <input type="file" class="mt_10" name="featured_photo">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Name</label>
                                            <input value="{{ $destination->name }}" name="name" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description</label>
                                            <input value="{{ $destination->description }}" type="text" class="form-control editor" name="description">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Country </label>
                                            <input value="{{ $destination->country }}" type="text" class="form-control" name="country">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Most Popular spot</label>
                                            <input value="{{ $destination->city }}" type="text" class="form-control" name="city">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Visa Requirment</label>
                                            <input value="{{ $destination->visa }}" type="text" class="form-control" name="visa">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Language </label>
                                            <input value="{{ $destination->language }}" type="text" class="form-control" name="language">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Currency </label>
                                            <input value="{{ $destination->currency }}" type="text" class="form-control" name="currency">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Activities </label>
                                            <input value="{{ $destination->activity }}" type="text" class="form-control" name="activity">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Best Time to Visit</label>
                                            <input value="{{ $destination->visit_time }}" type="text" class="form-control" name="visit_time">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Safety </label>
                                            <input value="{{ $destination->safety }}" type="text" class="form-control" name="safety">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Area </label>
                                            <input value="{{ $destination->area }}" type="text" class="form-control" name="area">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Time Zone </label>
                                            <input value="{{ $destination->time_zone }}" type="text" class="form-control" name="time_zone">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Map Link</label>
                                            <input value="{{ $destination->map_link }}" type="text" class="form-control" name="map_link">
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