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
                                                <th>Gallery</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach ($destinations as $destination)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $destination->featured_photo }}</td>
                                                    <td>{{ $destination->name }}</td>
                                                    <td>
                                                        <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-primary">Photo</i></a>
                                                        <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning">Video</i></a>
                                                    </td>
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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