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
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/admin/'.auth()->guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                        <input type="file" class="mt_10" name="photo" required>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Heading</label>
                                            <input name="heading" type="text" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Sub Heading</label>
                                            <input name="sub_heading" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Button Text </label>
                                            <input type="text" class="form-control" name="button_text">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Button Link </label>
                                            <input type="text" class="form-control" name="button_link">
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