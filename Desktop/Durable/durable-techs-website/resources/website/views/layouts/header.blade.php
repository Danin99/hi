<header>
    <nav class=" border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between mx-auto max-w-screen-xl p-4">
            <div class="flex flex-nowrap gap-5 items-end">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-16" alt="Flowbite Logo" />
                </a>

                <form class="max-w-md mx-auto w-[800px]">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 ps-11 pr-[90px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="find product..." required />
                        <button type="submit" class="text-white absolute end-[5px] bottom-[5px] bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-3 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>

            <div class="flex items-end space-x-8 rtl:space-x-reverse">
                <div class="flex flex-col items-center">
                    <i class="text-2xl fa-solid fa-circle-user"></i>
                    <h1 class="text-sm">Hello, Log in</h1>
                </div>
                <div class="flex flex-col items-center">
                    <i class="text-2xl fa-solid fa-cart-shopping"></i>
                    <h1 class="text-sm">My cart</h1>
                </div>
                <div class="flex flex-col items-center">
                    <i class="text-2xl fa-solid fa-people-roof"></i>
                    <h1 class="text-sm">About us</h1>
                </div>
            </div>
        </div>
    </nav>
    <div class="sticky top-0">
        <nav class="bg-blue-600 dark:bg-gray-700 font-serif">
            <div class="max-w-screen-xl text-nowrap mx-auto overflow-x-auto whitespace-nowrap hide-scrollbar">
                <div class="w-full md:w-auto px-4" id="navbar-default">
                    <ul class="flex font-medium w-full mt-0 space-x-4 rtl:space-x-reverse text-sm items-center">
                        <!-- computer -->
                        @foreach ($menuData as $menu)
                        <li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                            <button class="py-3 px-3 hover:bg-white hover:text-gray-800 text-white hvr-overline-reveal cursor-pointer" :aria-expanded="open" @click.prevent="open = !open" @click.prevent="open = !open" :class="{ 'hvr-overline-reveal-active': open }">
                                <span>{{ $menu['name'] }}</span>
                            </button>
                            <!-- 2nd level menu -->
                            <div class="!m-0 z-[999] absolute w-full h-screen top-[100%] left-1/2 -translate-x-1/2 bg-blue-100 bg-opacity-[0.7] border border-slate-200 shadow-xl [&[x-cloak]]:hidden" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak @focusout="await $nextTick();!$el.contains($focus.focused()) && (open = false)" @mouseover="open = false">
                            </div>

                            <div class="mx-4 z-[9999] absolute max-w-screen-xl w-full h-fit top-[100%] left-1/2 -translate-x-1/2 [&[x-cloak]]:hidden" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak @focusout="await $nextTick();!$el.contains($focus.focused()) && (open = true)">
                                <div class="w-full" class="menu">
                                    <div class="grid grid-cols-4 w-full mx-auto bg-white ">
                                        @foreach ($menu['categories'] as $category)
                                        <div class="h-[200px] flex gap-5 justify-center items-center flex-col hover:bg-gray-100 m-2">
                                            <img src="{{ asset('assets/' . $category['thumbnail']) }}" class="h-[100px]" alt="">
                                            <h1>{{ $category['name'] }}</h1>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>