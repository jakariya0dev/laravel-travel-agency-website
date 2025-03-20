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
            <h1>Add New Package</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('package.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <!-- Featured Photo -->
                                        <div class="mb-4">
                                            <img alt="" class="profile-photo w_100_p">
                                            <input type="file" class="mt_10 form-control" name="featured_photo">
                                        </div>

                                        <!-- Title -->
                                        <div class="mb-4">
                                            <label class="form-label">Title</label>
                                            <input value="{{ old('title') }}" name="title" type="text" class="form-control" required>
                                        </div>


                                        <!-- Description -->
                                        <div class="mb-4">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control editor">{{ old('description') }}</textarea>
                                        </div>

                                        <!-- Destination ID -->
                                        <div class="mb-4">
                                            <label class="form-label">Destination</label>
                                            <select name="destination_id" class="form-control" required>
                                                @foreach($destinations as $destination)
                                                    <option value="{{ $destination->id }}">
                                                        {{ $destination->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-4">
                                            <label class="form-label">Price</label>
                                            <input value="{{ old('price') }}" name="price" type="number" class="form-control" step="0.01" required>
                                        </div>

                                        <!-- Original Price -->
                                        <div class="mb-4">
                                            <label class="form-label">Original Price</label>
                                            <input value="{{ old('original_price') }}" name="original_price" type="number" class="form-control" step="0.01">
                                        </div>

                                        <!-- Map Link -->
                                        <div class="mb-4">
                                            <label class="form-label">Map Link</label>
                                            <input value="{{ old('map_link') }}" name="map_link" type="text" class="form-control">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4">
                                            <input type="submit" class="btn btn-primary" value="Add Package"></input>
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