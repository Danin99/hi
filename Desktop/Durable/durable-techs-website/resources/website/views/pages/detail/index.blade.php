@extends('website::layouts.body')
@include('website::components.meta', [
'title' => 'Detail' . ' -',
])

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- <style>
	.swiper {
		width: 100%;
		height: 100%;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.swiper-slide img {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}


	.swiper {
		width: 100%;
		height: 300px;
		margin-left: auto;
		margin-right: auto;
	}

	.swiper-slide {
		background-size: cover;
		background-position: center;
	}

	.mySwiper2 {
		height: 80%;
		width: 100%;
	}

	.mySwiper {
		height: 20%;
		box-sizing: border-box;
		padding: 10px 0;
	}

	.mySwiper .swiper-slide {
		width: 25%;
		height: 100%;
		opacity: 0.4;
	}

	.mySwiper .swiper-slide-thumb-active {
		opacity: 1;
	}

	.swiper-slide img {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
</style> -->

@endsection

@section('content')
<main class="mx-auto max-w-screen-xl my-6 px-4 ">
	<div class="grid grid-cols-2 p-4 bg-white shadow gap-4">
		<div class="h-[400px]">
			<div class="flex flex-1 items-center h-full flex-nowrap gap-3">
				<div class="w-[100px] float-none h-full">
					<div thumbsSlider="" class="swiper swiperPhoto" style="height: 100%;">
						<div class="swiper-wrapper">
							@for ($i = 0; $i < 10; $i++) <div class="swiper-slide border rounded-sm !p-[3px] !h-fit !mb-1 items-center">
								<img class="rounded-sm" src="data:image/jpeg;base64,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" />
						</div>
						@endfor
					</div>
				</div>
			</div>
			<div class="w-full overflow-hidden ">
				<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper swiperPreview">
					<div class="swiper-wrapper">
						@for ($i = 0; $i < 10; $i++) <div class="swiper-slide">
							<img class="w-full" src="data:image/jpeg;base64,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" />
					</div>
					@endfor
				</div>

			</div>
		</div>
	</div>
	</div>
	<div>
		<h1 class="text-3xl font-semibold pt-4 font-sans text-zinc-800">Lenovo 11.6" 64GB 100e Chromebook Gen 4 Multi-Touch Labtop (Graphite gray)</h1>
		<div class=" mt-2 w-full py-1 flex justify-between">
			<div>
				<!-- <span class="text-lg">In Stock</span> -->
				<span class="bg-green-100 text-green-800 text-base font-medium me-2 px-2.5 py-1 rounded">In Stock</span>
				<p class="text-3xl font-bold">$311.95</p>
			</div>
			<div>
				<img class="object-cover h-[40px] mt-7 ml-2" src="{{asset('assets/images/lenovo.webp')}}" alt="">
				<div class="text-sm ml-2"><a href=""> Authorize Dealer</a></div>
			</div>
		</div>


		<div x-data="{ currentVal: 1, minVal: 0, maxVal: 10, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-1">
			<label for="counterInput" class="pl-1 text-xl text-slate-800">Quantity</label>
			<div @dblclick.prevent class="flex items-center rounded-none border border-sky-600 w-[155px] py-1">
				<button @click="currentVal = Math.max(minVal, currentVal - incrementAmount)" class="flex h-[32px] items-center justify-center px-2 text-sky-600 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0" aria-label="subtract">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
						<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
					</svg>
				</button>
				<input x-model="currentVal.toFixed(decimalPoints)" id="counterInput" type="text" class=" h-[32px] w-[85px] border-hidden text-center text-sky-600" readonly />
				<button @click="currentVal = Math.min(maxVal, currentVal + incrementAmount)" class="flex h-[32px] items-center justify-center py-1.5 text-sky-600 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0" aria-label="add">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
					</svg>
				</button>
			</div>
		</div>

		<button type="button" class="text-sky-600 hover:text-white border border-sky-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-none text-base px-[25px] py-2.5 text-center me-2 mt-2 "><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
		<button type="button" class="text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-base px-6 py-2 me-2 mb-2 ">Buy Now</button>
		<a href="" class="text-base text-zinc-900"><i class="fa-regular fa-heart text-blue-800"></i> Add to wish list</a> <br>
	</div>
	</div>
	<div class="grid grid-cols-3 gap-4 pt-10">
		<div class="col-span-1 ">
			<div class="bg-blue-100 border-l-[5px] border-green-500">
				<h1 class="text-xl px-4 py-2 font-bold text-zinc-700 uppercase">Description</h1>
			</div>
			<div class="space-y-2 p-4 bg-white">
				@include('website::components.detail-latest-card')
				@include('website::components.detail-latest-card')
				@include('website::components.detail-latest-card')
				@include('website::components.detail-latest-card')
				@include('website::components.detail-latest-card')
				@include('website::components.detail-latest-card')
			</div>
		</div>
		<div class="col-span-2 ">
			<div class="mb-4">
				<div class="bg-blue-100 border-l-[5px] border-orange-400">
					<h1 class="text-xl px-4 py-2 font-bold text-zinc-700 uppercase">Description</h1>
				</div>
				<div class="bg-white p-4">
					<p class="text-gray-900">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem velit iure recusandae, sunt tempora libero nobis rem temporibus deserunt voluptates excepturi natus inventore sapiente ea eos nesciunt tenetur reprehenderit eaque harum, veniam dolor minima qui ducimus sint. Cum ea, tenetur libero saepe magnam earum quibusdam iste aperiam, omnis quia odit, ad autem in rerum aut? Incidunt ullam officiis repellat excepturi impedit praesentium minima fugiat, aspernatur at quam facere qui laborum! Ea quia fugiat quod saepe delectus ducimus incidunt quam unde labore consectetur praesentium, est, dolor aut reprehenderit nemo veniam obcaecati similique sed facilis repellat? Doloribus, illo molestiae. Nobis, quia totam?</p>
				</div>

			</div>

			<div>
				<div class="bg-blue-100 border-l-[5px] border-blue-500">
					<h1 class="text-xl px-4 py-2 font-bold text-zinc-700 uppercase">Related Product</h1>
				</div>
				<div class="grid grid-cols-2 gap-1 bg-white p-4">
					@include('website::components.card')
					@include('website::components.card')
					@include('website::components.card')
					@include('website::components.card')
					@include('website::components.card')
					@include('website::components.card')

				</div>
			</div>
		</div>
	</div>

</main>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
	var swiperphoto = new Swiper(".swiperPhoto", {
		spaceBetween: 0,
		slidesPerView: 7,
		direction: "vertical",
		freeMode: true,
		watchSlidesProgress: true,
		mousewheel: true,
	});

	var swiper2 = new Swiper(".swiperPreview", {
		spaceBetween: 10,
		effect: "fade",
		thumbs: {
			swiper: swiperphoto,
		},
		mousewheel: {
			enabled: false
		},
		keyboard: {
			enabled: false
		},
		preventInteractionOnTransition: true,
		iOSEdgeSwipeDetection: false,
		iOSEdgeSwipeThreshold: 0,
		allowTouchMove: false
	});
</script>
@endsection