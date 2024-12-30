<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Borneo Museum</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset('images/sarawak.jpg') }}" type="image/jpg">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
            .team-photo {
                width: 150px;
                height: 150px;
                object-fit: cover;
                border-radius: 50%;
            }
    
            body {
                
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                color: black;
            }
    
            body.bg-dark {
                
                color: rgb(232, 242, 248);
            }
    
            #notification {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 1050;
                display: none;
            }
    
            .map {
                width: 100%;
                height: 400px;
                border: 2px solid #ddd;
                border-radius: 10px;
            }
    
            body.bg-dark .form-control::placeholder {
                color: white; /* Dark mode placeholder color */
            }
            </style>
        @endif
    </head>

    <header>
        <div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end pr-7 py-1">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-full px-2 py-1 text-black ring-1 ring-grey transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
    
                        {{-- Check if the authenticated user is a superadmin --}}
                        @if (Auth::user()->role === 'superadmin')
                            <a
                                href="{{ route('register') }}"
                                class="rounded-full px-2 py-1 text-black ring-1 ring-grey transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-full px-2 py-1 text-black ring-1 ring-grey transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Admin
                        </a>
                    @endauth
                </nav>
            @endif
        </div>
        <h1 class="header-title">Borneo Cultural Museum Ticketing</h1>
    </header>

    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <p class="text-center">Book Your Tickets Now!</p>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Book Your Tickets Now!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#ticketing">Tickets</a></li>
                    </ul>
                    <!-- Add the toggle button here -->
                    <button id="darkModeToggle" class="btn btn-outline-secondary ms-auto">Switch Mode</button>
                </div>
            </div>
        </nav>
    </body>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Copyright © 2024 Web Programming Assignment.
    </footer>
</html>
