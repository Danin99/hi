@extends('admin::index')
@section('index')
<main>
    @include('admin::layouts.header')
    @include('admin::layouts.sidebar')
    @yield('content')
</main>
@endsection
