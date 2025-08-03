@extends('admin::index')
@section('index')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="h-[60px] mr-2" src="{{asset('assets/images/logo.jpg')}}" alt="logo">
            Durable Admin
        </a>
        @yield('auth')
    </div>
</section>
@endsection
