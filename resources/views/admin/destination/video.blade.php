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
                <h1>Destination Videos</h1>
                
            </div>

            <form action="{{ route('admin.d-photo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="section-header d-flex justify-content-between">
                    
                    <h1> Add New Destination Video </h1>
                    <h1>
                        <input type="text" class="" name="video_url" required>
                        <input type="hidden" name="destination_id" value="{{ $destinationVideos[0]->id }}">
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
                                                <th>Video</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach ($destinationVideos as $destinationVideo)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td><img src="{{ $destinationVideo->featured_photo }}" alt=""></td>
                                                    <td>{{ $destinationVideo->photo_name }}</td>
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('admin.d-video.delete', $destinationVideo->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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