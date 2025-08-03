@extends('website::app')
@section('body')
    @include('website::layouts.header')
    @yield('content')

    <div>  </div>
    @include('website::layouts.footer')
@endsection
