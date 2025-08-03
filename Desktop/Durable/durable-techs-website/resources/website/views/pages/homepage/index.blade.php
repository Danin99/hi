@extends('website::layouts.body')
@include('website::components.meta', [
'title' => '',
// 'title' => config('dummy.menu.home.text') . ' -',
])
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

@endsection
@section('content')
<main class="mx-auto w-full max-w-screen-xl px-4 py-2">
    <!-- Swiper -->
    <div class="swiper mySwiper h-[32rem]">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{asset('assets/images/slide.jpg') }}" />
            </div>
            <div class="swiper-slide">
                <img src="{{asset('assets/images/slide.jpg') }}" />
            </div>
            <div class="swiper-slide">
                <img src="{{asset('assets/images/slide.jpg') }}" />
            </div>
            <div class="swiper-slide">
                <img src="{{asset('assets/images/slide.jpg') }}" />
            </div>
            <div class="swiper-slide">
                <img src="{{asset('assets/images/slide.jpg') }}" />
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</main>
<div class="bg-blue-600 dark:bg-gray-700 mt-14 px-4 py-2 text-center text-slate-50 text-4xl font-serif">Unbeatable Zone</div>
<!--Lastest-->
<main class="mx-auto w-full max-w-screen-xl px-4 py-2 mt-3">
    <div class="text-center text-3xl text-white w-[25rem] mt-10 bg-sky-500 font-serif py-4">Lastest Products</div>
    <div class="grid grid-rows-2 grid-flow-col bg-white shadow-zinc-500 shadow-lg">
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2 font-serif">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2 font-serif">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2 font-serif">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
    </div>
    <div class="bg-white px-4 text-slate-900 text-xl border border-slate-200 text-right hover:underline uppercase font-serif py-4"><a href="">View all Detail</a></div>
</main>
<!-- Clearance -->
<!-- <div class="bg-sky-400 dark:bg-gray-700 px-4 py-2 text-center text-slate-50 text-2xl">Clearance Product</div> -->
<main class="mx-auto w-full max-w-screen-xl px-4 py-2">
    <!-- <div class="max-w-3xl mx-auto text-center mt-10 mb-10">
        <h1 class="text-3xl font-bold text-gray-900 leading-tight mb-2 border-t-4 border-b-4 border-sky-500 py-4">
            Clearance Product
        </h1>
    </div> -->
    <div class="text-center text-3xl text-white w-[25rem] mt-10 bg-sky-500 font-serif py-4">Clearance Products</div>
    <div class="grid grid-rows-2 grid-flow-col bg-white shadow-zinc-500 shadow-lg">
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2 font-serif">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5 border py-3 hover:bg-slate-200 font-serif">
            <div><a href=""><img class="w-screen h-[8rem]" src="{{asset('assets/images/ASUS.jpeg')}}" alt=""></a></div>
            <div class="grid grid-rows-3 grid-flow-col gap-3 col-span-2">
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
                <div>Price: 1000$</div>
                <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</div>
            </div>
        </div>
    </div>
    <div class="bg-white px-4 text-slate-900 text-xl border border-slate-200 text-right hover:underline uppercase font-serif py-4"><a href="">View all Detail</a></div>
</main>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
@endsection