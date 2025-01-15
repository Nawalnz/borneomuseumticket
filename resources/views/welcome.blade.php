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
                        <li class="nav-item"><a class="nav-link" href="#ticketing">Ticket</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tteam">Team</a></li>
                    </ul>
                    <!-- Add the toggle button here -->
                    <button id="darkModeToggle" class="btn btn-outline-secondary ms-auto">Switch Mode</button>
                </div>
            </div>
        </nav>

        <!-- Homepage -->
<section id="home" class="container mt-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button> <!-- New Indicator -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://museum.sarawak.gov.my/web/attachment/show/?docid=U2IvK29RQkVjSFUxNVpEVHZudEdHdz09OjpjHWh2kLIlorlGnAdz79su" class="d-block w-100" alt="Borneo Museum Image 1">
            </div>
            <div class="carousel-item">
                <img src="https://media.malaysianow.com/wp-content/uploads/2022/03/06224812/BCM-night-2.jpg" class="d-block w-100" alt="Borneo Museum Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://tatknows.com/upload/directory/article/304/FF3B8573-1ADA-4B13-AB48-84497C818FB7.jpeg" class="d-block w-100" alt="Borneo Museum Image 3">
            </div>
            <div class="carousel-item">
                <img src="https://images.prestigeonline.com/wp-content/uploads/sites/5/2022/03/24113829/FeaturedHero-image-2-11.jpg" class="d-block w-100" alt="Borneo Museum Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</section>

<!-- Ticketing System -->
<section id="ticketing" class="container mt-5">
    <h2 class="text-center">Book Your Tickets HERE!</h2>
    <form id="bookingForm" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your Full Name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your Email" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date of Visit</label>
            <input type="date" class="form-control" id="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Time of Visit</label>
            <input type="time" class="form-control" id="time" required>
        </div>
        <div class="mb-3">
            <label for="slot" class="form-label">Category</label>
            <select id="slot" class="form-select" required>
                <option value="" disabled selected>Please Select your Category</option>
                <option value="5">13-17 Years old an Student with id RM 5</option>
                <option value="25">Foreigner RM 25</option>
                <option value="10">Adult Sarawakian rm 10</option>
                <option value="20">Adult non Sarawakian rm 20</option>
                <option value="50">Adult Foreigner RM 50</option>
                <option value="5">Senior Citizen Sarawakian 61 and above RM 5</option>
                <option value="10">Senior Citizen non Sarawakian 61 and above RM 10</option>
                <option value="25">Foreignet Senior Citizen Sarawakian 61 and above RM 25</option>
                <option value="0">Disability person with registered free</option>
                <option value="25">Foreignet Senior Citizen Sarawakian 61 and above RM 25</option>
                <option value="100">Unlimited visit RM 100</option>
                <option value="8">sarawakian group per person RM 8</option>
                <option value="16">Non sarawakian group per person RM 16</option>
                <option value="40">Foreigner group per person RM 40</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Book Ticket</button>
    </form>
</section>

<!-- Notification Alert -->
<div id="notification" class="alert alert-success">
    Ticket booked successfully! Thank you for your payment and enjoy your visit.
</div>
    </body>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        Copyright © 2024 Web Programming Assignment.
    </footer>
</html>
