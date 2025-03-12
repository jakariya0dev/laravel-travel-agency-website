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
            <h1>Edit About Section</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.about.update', $about->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/admin/about/'.$about->photo) }}" alt="" class="profile-photo w_100_p">
                                        <input type="file" class="mt_10" name="photo">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Title</label>
                                            <input value="{{ $about->title }}" name="title" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description</label>
                                            <textarea style="display: block; width: 100%; height: 15vh; padding: 10px;" class="block" name="description">
                                                {{ $about->description }}
                                            </textarea>
                                            
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Video Link </label>
                                            <input value="{{ $about->video_link }}" type="text" class="form-control" name="video_link">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Button Text </label>
                                            <input value="{{ $about->button_text }}" type="text" class="form-control" name="button_text">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Button Link</label>
                                            <input value="{{ $about->button_link }}" type="text" class="form-control" name="button_link">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Show/Hide This Section</label>
                                            <select name="status" class="form-control">
                                                <option value="show" {{ $about->status == 'show' ? 'selected' : '' }}>Show</option>
                                                <option value="hide" {{ $about->status == 'hide' ? 'selected' : '' }}>Hide</option>
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