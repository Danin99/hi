@php
    $usr = Auth::guard('admin')->user();
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#1c2434] border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-[#1c2434]">
        <ul class="space-y-2 font-medium">
            @if ($usr->can('dashboard.view'))
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center py-2 px-4 gap-3 text-gray-300 hover:text-gray-50 rounded-sm hover:bg-gray-700 group transition duration-300">
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-gray-100" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="#"
                    class="flex items-center py-2 px-4 gap-3 text-gray-300 hover:text-gray-50 rounded-sm hover:bg-gray-700 group transition duration-300">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 group-hover:text-gray-100" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center py-2 px-4 gap-3 text-gray-300 hover:text-gray-50 rounded-sm hover:bg-gray-700 group transition duration-300">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-300 group-hover:text-gray-100" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <button type="button" @class([
                    'bg-gray-600' => request()->is('admin/settings/*'),
                    'flex items-center font-semibold w-full py-2 px-4 text-base text-gray-300 hover:text-gray-50 rounded-sm hover:bg-gray-700 group transition duration-300',
                ]) aria-controls="dropdown-example"
                    data-collapse-toggle="dropdown-example">
                    <i class="fa-solid fa-gear me-3"></i>
                    <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Settings</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="pt-1 space-y-1 hidden">
                    @if ($usr->can('role.view'))
                        <li>
                            <a href="{{ route('admin.roles.index') }}" @class([
                                'bg-gray-600' => !!Request::routeIs('admin.roles.*'),
                                'flex items-center w-full py-2 px-4 pl-12 text-gray-300 hover:text-gray-50 rounded-sm hover:bg-gray-700 group transition duration-300',
                            ])>Role</a>
                        </li>
                    @endif

                    @if ($usr->can('admin.view'))
                        <li>
                            <a href="{{ route('admin.admins.index') }}" @class([
                                'bg-gray-600' => !!Request::routeIs('admin.admins.*'),
                                'flex items-center w-full py-2 px-4 pl-12 text-gray-300 hover:text-gray-50 rounded-sm hover:bg-gray-700 group transition duration-300',
                            ])>Admin</a>
                        </li>
                    @endif
                </ul>
            </li>

        </ul>
    </div>
</aside>
