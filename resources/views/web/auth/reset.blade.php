@extends('web.layouts.master')

@section('main-content')

    <div class="page-top" style="background-image: url('{{ asset('uploads/web/banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Create Account</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Account</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt_70 pb_70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <form action="{{ route('user.password.update', [$token, $email]) }}" method="post">
                        @csrf
                        <div class="login-form">
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Password *</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control" name="confirm_password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Create Account
                                </button>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('user.login.view') }}" class="primary-color">Existing User? Login Now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

        
        

