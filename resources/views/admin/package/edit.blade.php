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
                            <form action="{{ route('package.update', $package->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <!-- Featured Photo -->
                                        <div class="mb-4">
                                            <img src="{{ asset('uploads/admin/sliders/'.$package->featured_photo) }}" alt="" class="profile-photo w_100_p">
                                            <input type="file" class="mt_10 form-control" name="featured_photo">
                                        </div>

                                        <!-- Title -->
                                        <div class="mb-4">
                                            <label class="form-label">Title</label>
                                            <input value="{{ old('title', $package->title) }}" name="title" type="text" class="form-control" required>
                                        </div>


                                        <!-- Description -->
                                        <div class="mb-4">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control editor" required>{{ old('description', $package->description) }}</textarea>
                                        </div>

                                        <!-- Destination ID -->
                                        <div class="mb-4">
                                            <label class="form-label">Destination</label>
                                            <select name="destination_id" class="form-control" required>
                                                @foreach($destinations as $destination)
                                                    <option value="{{ $destination->id }}" {{ $package->destination_id == $destination->id ? 'selected' : '' }}>
                                                        {{ $destination->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-4">
                                            <label class="form-label">Price</label>
                                            <input value="{{ old('price', $package->price) }}" name="price" type="number" class="form-control" step="0.01" required>
                                        </div>

                                        <!-- Original Price -->
                                        <div class="mb-4">
                                            <label class="form-label">Original Price</label>
                                            <input value="{{ old('original_price', $package->original_price) }}" name="original_price" type="number" class="form-control" step="0.01">
                                        </div>

                                        <!-- Map Link -->
                                        <div class="mb-4">
                                            <label class="form-label">Map Link</label>
                                            <input value="{{ old('map_link', $package->map_link) }}" name="map_link" type="text" class="form-control">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-primary">Update Package</button>
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