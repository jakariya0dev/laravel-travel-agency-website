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
                <h1>Package Video Videos</h1>
                
            </div>

            <form action="{{ route('admin.p-video.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="section-header d-flex justify-content-between">
                    
                    <div>
                        <h1> Add New YouTube Video ID (Only) Here </h1> <br>
                        <p>Ex: https://www.youtube.com/watch?v=<mark class="bg-warning">8AgeNvHZ_ks</mark></p>
                    </div>
                    <h1>
                        <input type="text" class="w-full" name="video_url" required>
                        <input type="hidden" name="package_id" value="{{ $package_id }}">
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

                                            @foreach ($packageVideos as $packageVideo)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <iframe width="250" height="150" src="https://www.youtube.com/embed/{{ $packageVideo->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                    </td>
                                                    
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('admin.p-video.delete', $packageVideo->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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