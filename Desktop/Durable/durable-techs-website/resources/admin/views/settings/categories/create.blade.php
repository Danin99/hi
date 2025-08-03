@extends('admin::layouts.body')
@include('admin::components.meta', [
    'title' => 'Create Admins -',
])


@section('content')
    <div class="px-8 sm:ml-64 bg-[#f1f5f9] h-screen">
        <div class="pt-14 pb-8">
            <div class="gap-4">

                <div class="pt-6 mb-5 rounded-md flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-[#1c2441]">Create Role</h1>
                    <nav class="font-normal">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500">Dashboard /</a>
                        <a href="{{ route('admin.admins.index') }}" class="text-gray-500">Admin /</a>
                        <span class="text-blue-500">Create</span>
                    </nav>
                </div>

                <form action="{{ route('admin.admins.store') }}" method="POST" class="bg-white p-6 border">
                    @csrf

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label for="roles" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                Assign Role
                            </label>
                            <select id="roles" name="roles[]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm w-full">
                                <option disabled selected>Choose a Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                Username
                            </label>
                            <input type="text" id="username" name="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                                placeholder="Enter Username" required />
                        </div>

                        <div>
                            <label for="name" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                Name
                            </label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                                placeholder="Enter Name" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                Email
                            </label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                                placeholder="Enter Name" required />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                Password
                            </label>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                                placeholder="Enter Password" />
                        </div>
                        <div>
                            <label for="password_confirmation"
                                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                                Confirm Password
                            </label>
                            <input type="text" id="password_confirmation" name="password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-[8px] px-3"
                                placeholder="Enter Password Again" />
                        </div>

                    </div>


                    <div class="flex gap-2 mt-5">
                        <button type="submit">
                            <a href="{{ route('admin.admins.index') }}" type="button"
                                class="flex gap-3 items-center px-5 py-3 justify-center text-white bg-[#3c50e0] focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">
                                <i class="fa-solid fa-arrow-left mt-[1px]"></i>
                                Back
                            </a>
                        </button>
                        <button type="submit"
                            class="flex gap-3 items-center px-5 py-3 justify-center text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">Save</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
