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
                            <form action="{{ route('package-faq.update', $package_faq->id) }}" method="post"">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-12">
                                       

                                        <!-- question -->
                                        <div class="mb-4">
                                            <label class="form-label">Question</label>
                                            <input value="{{ $package_faq->question }}" name="question" type="text" class="form-control" required>
                                    
                                        </div>

                                        <!-- answer -->
                                        <div class="mb-4">
                                            <label class="form-label">Answer</label>
                                            <textarea name="answer" class="form-control editor">{{ $package_faq->answer }}</textarea>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4">
                                            <input type="submit" class="btn btn-primary" value="Add Package"></input>
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