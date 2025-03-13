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
            <h1>Edit About Section</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.feature.update', $feature->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Icon 1</label>
                                            <input value="{{ $feature->icon_1 }}" name="icon_1" type="text" class="form-control">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Title 1</label>
                                            <input value="{{ $feature->title_1 }}" name="title_1" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Subtile 1</label>
                                            <textarea style="display: block; width: 100%; height: 15vh; padding: 10px;" class="block" name="subtitle_1">
                                                {{ $feature->subtitle_1 }}
                                            </textarea>
                                            
                                        </div>
                                        
                                        <hr>
                                        {{-- two --}}

                                        <div class="mb-4">
                                            <label class="form-label">Icon 2</label>
                                            <input value="{{ $feature->icon_2 }}" name="icon_2" type="text" class="form-control">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Title 2</label>
                                            <input value="{{ $feature->title_2 }}" name="title_2" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Subtile 2</label>
                                            <textarea style="display: block; width: 100%; height: 15vh; padding: 10px;" class="block" name="subtitle_2">
                                                {{ $feature->subtitle_2 }}
                                            </textarea>
                                            
                                        </div>

                                        <hr>
                                        {{-- Three --}}

                                        <div class="mb-4">
                                            <label class="form-label">Icon 3</label>
                                            <input value="{{ $feature->icon_3 }}" name="icon_3" type="text" class="form-control">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Title 3</label>
                                            <input value="{{ $feature->title_3 }}" name="title_3" type="text" class="form-control">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Subtile 3</label>
                                            <textarea style="display: block; width: 100%; height: 15vh; padding: 10px;" class="block" name="subtitle_3">
                                                {{ $feature->subtitle_3 }}
                                            </textarea>
                                            
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