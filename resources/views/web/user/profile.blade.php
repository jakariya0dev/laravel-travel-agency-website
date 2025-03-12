@extends('web.layouts.master')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/web/banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Profile</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel pt_70 pb_70">
        <div class="container-fluid">
            <div class="row">
                
                @include('web.user.sidebar')
                
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Existing Photo</label>
                                <div class="form-group">
                                    <img src="uploads/user-photo.jpg" alt="" class="user-photo">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Change Photo</label>
                                <div class="form-group">
                                    <input type="file" name="photo">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Full Name *</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email Address *</label>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone *</label>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Country *</label>
                                <div class="form-group">
                                    <input type="text" name="country" class="form-control" value="{{ auth()->user()->country }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address *</label>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">State *</label>
                                <div class="form-group">
                                    <input type="text" name="state" class="form-control" value="{{ auth()->user()->state }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">City *</label>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control" value="{{ auth()->user()->city }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Zip Code *</label>
                                <div class="form-group">
                                    <input type="text" name="zip" class="form-control" value="{{ auth()->user()->zip }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Password</label>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Retype Password</label>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="form_update" type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

        