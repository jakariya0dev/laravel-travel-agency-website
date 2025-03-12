<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TripSummit</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('dist-web/uploads/favicon.png') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('dist-web/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/bootstrap-datepicker.min.css') }}">
        <!--<link rel="stylesheet" href="{{ asset('dist-web/css/jquery-ui.css') }}">-->
        <link rel="stylesheet" href="{{ asset('dist-web/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-web/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">

        <!-- All JavaScript -->
        <script src="{{ asset('dist-web/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/bootstrap-datepicker.min.js') }}"></script>
        <!--<script src="{{ asset('dist-web/js/jquery-ui.js') }}"></script>-->
        <script src="{{ asset('dist-web/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/wow.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/select2.full.js') }}"></script>
        <script src="{{ asset('dist-web/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/moment.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/counterup.min.js') }}"></script>
        <script src="{{ asset('dist-web/js/multi-countdown.js') }}"></script>
        <script src="{{ asset('dist-web/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>


        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        
        {{-- topbar --}}
        @include('web.layouts.topbar')
        

        {{-- navbar --}}
        @include('web.layouts.navbar')


        @yield('main-content')
        
        
        {{-- footer --}}
        @include('web.layouts.footer')

        <script src="{{ asset('dist-web/js/custom.js') }}"></script>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    iziToast.show({
                        message: '{{ $error }}',
                        color: 'red',
                        position: 'topRight',
                    });
                </script>
            @endforeach
        @endif

        @if(session('success'))
            <script>
                iziToast.show({
                    message: '{{ session("success") }}',
                    color: 'green',
                    position: 'topRight',
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                iziToast.show({
                    message: '{{ session("error") }}',
                    color: 'red',
                    position: 'topRight',
                });
            </script>
        @endif
    </body>
</html>
