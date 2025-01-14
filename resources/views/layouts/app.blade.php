<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Borneo Cultural Museum') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
        :class="{ 'dark': darkMode }"
        class="font-sans antialiased text-gray-900 dark:text-gray-100">
        
        <!-- Navbar -->
        @include('partials.navbar')

        <!-- Main Content -->
        <div class="bg-gray-100 dark:bg-gray-900 min-h-screen">
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>

            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>
    </body>
</html>
