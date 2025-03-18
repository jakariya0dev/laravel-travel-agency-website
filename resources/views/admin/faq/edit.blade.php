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
            <h1>Add New FAQ</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('faq.update', $faq->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Name</label>
                                            <input value="{{ $faq->title }}" name="title" type="text" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description</label>
                                            <input value="{{ $faq->description }}" name="description" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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