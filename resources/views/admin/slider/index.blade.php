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
                <h1>All Sliders</h1>
                <a class="btn btn-primary btn-lg" href="{{ route('slider.create') }}">Add New Slider</a>
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
                                                <th>Headinng</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach ($sliders as $slider)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $slider->heading }}</td>
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_1"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        
                                                    </td>
                                                    <div class="modal fade" id="modal_1" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">{{ $slider->heading }}</label></div>
                                                                    </div>
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">{{$slider->sub_heading}}</label></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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