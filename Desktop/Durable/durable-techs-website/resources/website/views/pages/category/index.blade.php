@extends('website::layouts.body')
@include('website::components.meta', [
'title' => '',
// 'title' => config('dummy.menu.home.text') . ' -',
])

@section('content')
<main class="mx-auto w-full max-w-screen-xl px-4 py-2">
  <div class="grid grid-cols-4 gap-6">

    <div class="col-span-1 mt-4">
      <div class="w-full flex justify-center bg-blue-500 text-white p-3 border-gray-400 items-center hover:bg-slate-100">
        Filter
      </div>
      <div class="border-t  border-gray-400">
        <div class="w-full flex justify-between border-b p-3 border-gray-400 items-center hover:bg-slate-100">
          Brand
          <i class="fa-solid fa-plus"></i>
        </div>
        <div class="w-full flex justify-between border-b p-3 border-gray-400 items-center hover:bg-slate-100">
          Processor
          <i class="fa-solid fa-plus"></i>
        </div>
        <div class="w-full flex justify-between border-b p-3 border-gray-400 items-center hover:bg-slate-100">
          Operating System
          <i class="fa-solid fa-plus"></i>
        </div>
        <div class="w-full flex justify-between border-b p-3 border-gray-400 items-center hover:bg-slate-100">
          RAM
          <i class="fa-solid fa-plus"></i>
        </div>
        <div class="w-full flex justify-between border-b p-3 border-gray-400 items-center hover:bg-slate-100">
          CPU
          <i class="fa-solid fa-plus"></i>
        </div>
        <div class="w-full flex justify-between border-b p-3 border-gray-400 items-center hover:bg-slate-100">
          Color
          <i class="fa-solid fa-plus"></i>
        </div>
      </div>

    </div>
    <div class="col-span-3">
      <div class="w-full flex justify-between bg-white p-3">
        <div class="">
          <h1 class="text-xl font-sans">Basic Labtop</h1>
          <span class="">85 items</span>
        </div>
        <div class="flex gap-2 items-center">
          <div x-data="{ open: false, selected: '' }" @click.away="open = false" class="relative">
            <!-- Button -->
            <button @click="open = !open" class="min-w-[180px] max-w-[180px] px-4 py-2 border border-gray-300 rounded flex items-center justify-between" :class="{'text-black': selected !== '', 'text-gray-500': selected === ''}">
              <span class="max-w-[120px] text-[12px] overflow-hidden" x-text="selected === '' ? 'Select an option' : selected"></span>
              <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" class="absolute mt-2 bg-white border rounded w-full z-10" x-cloak>
              <ul class="max-h-[140px] text-[12px] overflow-auto [&>li]:text-gray-500 [&>li]:px-4 [&>li]:py-2 hover:[&>li]:bg-gray-100 [&>li]:cursor-pointer">
                <li @click="selected = 'Option 1'; open = false;" value="1">Option 1</li>
                <li @click="selected = 'Option 2'; open = false;" value="2">Option 2</li>
                <li @click="selected = 'Option 3'; open = false;" value="3">Option 3</li>
                <li @click="selected = 'Option 4'; open = false;" value="4">Option 4</li>
                <li @click="selected = 'Option 5'; open = false;" value="5">Option 5</li>
              </ul>
            </div>
          </div>
          <form class="flex items-center max-w-sm mx-auto mb-0">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                </svg>
              </div>
              <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-[12px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-1  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
            </div>
            <button type="submit" class="p-2.5 ms-2 font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
              <span class="sr-only">Search</span>
            </button>
          </form>

        </div>
      </div>
      <div class="bg-gray-300 p-3 space-y-3">
        @for ($i = 0; $i < 6; $i++) <div class="grid grid-cols-4 bg-white p-5 gap-4">
          <div class="col-span-1 bg-white">
            <div class="relative">
              <span class="absolute top-0 left-0 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded ">In Stock</span>
              <img class="object-cover h-[180px]" src="{{asset('assets/images/laptop.webp')}}" alt="">
            </div>
          </div>
          <div class="col-span-2 bg-white">
            <div>
              <h2>Lenovo 11.6 "64GB 100e Chromebook Gen 4 multi-Touch Labtop(Graphite gray)"</h2>
              <h1 class="font-bold text-[14px]">Key feature</h1>
              <div x-data="{ open: false, maxRows: 6, fullText: '', slicedText: '', rows: [] }" x-init="fullText = $el.firstElementChild.innerHTML.trim();
                  rows = fullText.split('\n');
                  slicedText = rows.slice(0, maxRows).join('</li><li>')">
                <div x-html="open ? fullText.replace(/\n/g, '</li><li>') : '<ul><li>' + slicedText + '</li></ul>'" x-transition>
                  <ul class="text-[11px] ">
                    <li>* 8GHz intel N100 Quad-Core</li>
                    <li>* 8GB LPDDR5 RAM | 64GB eMMC SSD</li>
                    <li>* 11.6" 1366x768 IPS Touchscreen</li>
                    <li>* Integrated Intel UHD Graphics</li>
                    <li>* 8GB LPDDR5 RAM | 64GB eMMC SSD</li>
                    <li>* 11.6" 1366x768 IPS Touchscreen</li>
                    <li>* Integrated Intel UHD Graphics</li>
                  </ul>
                </div>
                <button @click="open = ! open" x-html="open ? 'Show less' : 'Show more'" class="text-[12px] text-blue-600"></button>
              </div>

              <!-- <h1 class="font-bold text-[14px]">Key feature</h1> 
              <ul class="list-disc text-[10px] pl-3">
                <li>8GHz intel N100 Quad-Core</li>
                <li>8GB LPDDR5 RAM | 64GB eMMC SSD</li>
                <li>11.6" 1366x768 IPS Touchscreen</li>
                <li>Integrated Intel UHD Graphics</li>
              </ul>
              <a href="" class="text-[12px] text-cyan-500">Show More <i class="fa-solid fa-chevron-down"></i></a> -->
            </div>
          </div>
          <div class="col-span-1">
            <div class="flex justify-between">
              <h1 class="font-bold text-[20px] text-zinc-800">$311<sup>95</sup></h1>
              <!-- <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded ">In Stock</span>              -->
            </div>
            <button type="button" class="text-sky-500 hover:text-white border border-sky-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-[13px] mt-2 px-5 py-1 text-center me-2 mb-1"><i class="fa-solid fa-cart-plus"></i> Add to cart</button> <br>
            <a href="" class="text-[12px] text-neutral-500"><i class="fa-regular fa-heart"></i> Add to wish list</a> <br>
            <input type="checkbox" name="" id="" class="px-2 w-1.5 h-3.5 text-slate-500"><span class="text-[12px] text-center text-gray-700"> Add to Compare</span> <br>
          </div>
      </div>
      @endfor
    </div>
    <div class=" bg-white w-full p-5 flex justify-center">
      <div class="flex">
        <!-- Previous Button -->
        <a href="#" class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700">
          <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
          </svg>
          Previous
        </a>
        <a href="#" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          Next
          <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
      </div>
    </div>
  </div>
  </div>

</main>
@endsection