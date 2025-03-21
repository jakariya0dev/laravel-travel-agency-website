@extends('admin.layouts.master')

@section('content')

{{-- Navbar --}}
@include('admin.layouts.navbar')
{{-- Navbar --}}

{{-- Sidebar --}}
@include('admin.layouts.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>All Destinations</h1>
                <a class="btn btn-primary btn-lg" href="{{ route('destinations.create') }}">Add New Destinations</a>
            </div>

            <form action="{{ route('admin.d-photo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="section-header d-flex justify-content-between">
                    
                    <h1> Add New Photo </h1>
                    <h1>
                        <input type="file" class="" name="image" required>
                        <input type="hidden" name="destination_id" value="{{ $destinationPhotos[0]->destination_id }}">
                    </h1> 
                    <input class="btn btn-primary btn-lg" type="submit"></input>
                        
                </div>
            </form>
            
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach ($destinationPhotos as $destinationPhoto)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td><img src="{{ $destinationPhoto->featured_photo }}" alt=""></td>
                                                    <td>{{ $destinationPhoto->photo_name }}</td>
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('admin.d-photo.delete', $destinationPhoto->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                           
                                            

                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection