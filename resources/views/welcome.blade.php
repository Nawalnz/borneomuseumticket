<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Borneo Museum</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/carousel.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <!-- Navigation Bar -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <x-navbar></x-navbar>
            </div>

            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white font-semibold hover:text-gray-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:text-gray-300">Admin</a>
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- Carousel Section -->
    <div class="container mx-auto mt-6">
        <x-carousel />
    </div>
</body>
</html>
