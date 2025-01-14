@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4">
    <!-- Slideshow -->
    <div x-data="{ activeSlide: 0, slides: ['images/slide1.jpg', 'images/slide2.jpg', 'images/slide3.jpg'] }">
        <div class="relative">
            <template x-for="(slide, index) in slides" :key="index">
                <img x-show="activeSlide === index" :src="slide" class="w-full rounded-md shadow-lg" />
            </template>

            <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full">
                &#8592;
            </button>
            <button @click="activeSlide = (activeSlide + 1) % slides.length" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-600 text-white p-2 rounded-full">
                &#8594;
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="text-center mt-8">
        <h1 class="text-3xl font-bold">Welcome to Borneo Cultural Museum</h1>
        <p class="mt-4 text-gray-600">Explore, learn, and be inspired by our rich heritage and history.</p>
    </div>
</div>
@endsection
