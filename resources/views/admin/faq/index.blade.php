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
                <h1>All Faqs</h1>
                <a class="btn btn-primary btn-lg" href="{{ route('faq.create') }}">Add New review</a>
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
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach ($faqs as $faq)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $faq->title }}</td>
                                                    
                                                    <td class="pt_10 pb_10">
                                                        
                                                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_{{ $loop->index + 1 }}"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        
                                                    </td>
                                                    <div class="modal fade" id="modal_{{ $loop->index + 1 }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">{{ $faq->title }}</label></div>
                                                                    </div>
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">{{$faq->description}}</label></div>
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