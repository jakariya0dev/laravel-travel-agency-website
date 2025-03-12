
@extends('web.layouts.master')

@section('main-content')

        

        <div class="page-top" style="background-image: url('{{ asset('uploads/web/banner.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Forget Password</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Forget Password</li>
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
                        <div class="login-form">
                            <form action="{{ route('user.password.email') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Email Address</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary bg-website">
                                        Submit
                                    </button>
                                    
                                </div>
                            </form>
                        </div>

                        <a href="{{ route('user.login.view') }}" class="primary-color">Back to Login Page</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
