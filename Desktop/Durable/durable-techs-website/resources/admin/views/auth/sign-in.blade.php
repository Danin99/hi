@extends('admin::auth.index')
@section('auth')

<div
    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Sign in to your account
        </h1>
        <form class="space-y-4 md:space-y-6" action="{{ route('admin.login.submit') }}" method="post">
            @csrf
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    placeholder="name@company.com" required autocomplete="username" autofocus>
            </div>
            <div>
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                    required="">
            </div>
            <button class="w-full text-black border-red-100 border py-2 rounded-lg text-lg font-bold">Sign in</button>

        </form>
    </div>
</div>
@stop
