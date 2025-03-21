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
                <h1>Package Excluded</h1>
                
            </div>

            <form action="{{ route('admin.p-exclude.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="section-header d-flex justify-content-between">
                    
                    <div>
                        <h1> Add New Package Excluding </h1> <br>
                    </div>
                    <h1>
                        <input type="text" class="w-full" name="title" required>
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
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach ($package_excludes as $package_exclude)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        {{ $package_exclude->title }}
                                                    </td>
                                                    
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('admin.p-exclude.delete', $package_exclude->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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