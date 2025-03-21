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
                <h1>All Packages</h1>
                <a class="btn btn-primary btn-lg" href="{{ route('package.create') }}">Add New Package</a>
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

                                            @foreach ($packages as $package)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $package->featured_photo }}</td>
                                                    <td>{{ $package->title }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.p-photo.index', $package->id) }}" class="btn btn-primary">Photo</i></a>
                                                        <a href="{{ route('admin.p-video.index', $package->id) }}" class="btn btn-primary">Video</i></a>
                                                        <a href="{{ route('admin.p-include.index', $package->id) }}" class="btn btn-warning">Includes</i></a>
                                                        <a href="{{ route('admin.p-exclude.index', $package->id) }}" class="btn btn-warning">Excludes</i></a>
                                                        <a href="{{ route('package-faq.index', $package->id) }}" class="btn btn-info">FAQs</i></a>
                                                    </td>
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('package.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('package.edit', $package->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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