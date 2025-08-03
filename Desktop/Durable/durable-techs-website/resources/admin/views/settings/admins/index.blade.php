@extends('admin::layouts.body')
@include('admin::components.meta', [
    'title' => 'Admins List -',
])

@section('content')
    <div class="px-8 sm:ml-64 bg-[#f1f5f9] h-screen">
        <div class="pt-14 pb-8">
            <div class="gap-4">

                <div class="pt-6 mb-5 rounded-md flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-[#1c2441]">Role Lists</h1>
                    <nav class="font-normal">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500">Dashboard /</a>
                        <span class="text-blue-500">Role</span>
                    </nav>
                </div>

                <div class="bg-white relative border overflow-hidden">
                    <div
                        class="p-6 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.admins.index') }}" method="GET">
                                @if (request()->query('v'))
                                    <input type="hidden" name="v" value="{{request()->query('v')}}">
                                @endif
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text"
                                        name="search_keyword" value="{{request()->query('search_keyword')}}"
                                        class="bg-gray-50 text-gray-900 text-sm border-none focus:border-none block w-full pl-10 p-3"
                                        placeholder="Search" required>
                                </div>
                            </form>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.admins.index',['v' => 'trush']) }}" type="button"
                                class="flex items-center h-[43px] w-[43px] justify-center text-white bg-red-700 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <a href="{{ route('admin.admins.index') }}" type="button"
                                class="flex items-center h-[43px] w-[43px] justify-center text-white bg-green-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">
                                <i class="fa-solid fa-rotate"></i>
                            </a>
                            @if (Auth::guard('admin')->user()->can('admin.create'))
                                <a href="{{ route('admin.admins.create') }}" type="button"
                                    class="flex items-center h-[43px] px-5 py-3 justify-center text-white bg-[#3c50e0] hover:bg-[#3c4fe0f0] bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm focus:outline-none">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Create Role
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        @include('admin::settings.admins.table')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
