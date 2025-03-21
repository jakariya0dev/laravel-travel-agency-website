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
            <h1>Add New Package Faq</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('package-faq.store') }}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">

                                        {{-- Package ID --}}
                                        <input type="hidden" name="package_id" value="{{ $package_id }}">

                                       <!-- question -->
                                        <div class="mb-4">
                                            <label class="form-label">Question</label>
                                            <input type="text" name="question" class="form-control" value="{{ old('question') }}"></input>
                                        </div>

                                        <!-- answer -->
                                        <div class="mb-4">
                                            <label class="form-label">Answer</label>
                                            <input value="{{ old('answer') }}" name="answer" type="text" class="form-control" required>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4">
                                            <input type="submit" class="btn btn-primary" value="Add Package Faq"></input>
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