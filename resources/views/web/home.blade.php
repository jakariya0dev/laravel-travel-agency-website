@extends('web.layouts.master')

@section('main-content')
    {{-- hero --}}
    @include('web.layouts.home.hero')

    {{-- about --}}
    @if ($about->status == 'show')
        @include('web.layouts.home.about')
    @endif

    {{-- destination --}}
    @include('web.layouts.home.destination')

    {{-- feature --}}
    @include('web.layouts.home.feature')

    {{-- packages --}}
    @include('web.layouts.home.package')

    {{-- review --}}
    @include('web.layouts.home.review')

    {{-- blog --}}
    @include('web.layouts.home.blog')

@endsection