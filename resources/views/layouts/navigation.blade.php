<nav x-data="{ open: false, darkMode: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                        {{ __('About Us') }}
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                        {{ __('Contact Us') }}
                    </a>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                                {{ __('Dashboard') }}
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings and Dark Mode -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode; document.documentElement.classList.toggle('dark', darkMode)"
                        class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!darkMode" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1M16.22 7.78l-.7.7M21 12h-1M16.22 16.22l-.7-.7M12 21v-1M7.78 16.22l.7-.7M3 12h1M7.78 7.78l.7.7" />
                        <path x-show="darkMode" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8.5a3.5 3.5 0 110 7 3.5 3.5 0 010-7z" />
                    </svg>
                </button>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="ml-4">
                    @csrf
                    <button type="submit" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>

            <!-- Hamburger for Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                {{ __('Home') }}
            </a>
            <a href="{{ route('about') }}" class="block text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                {{ __('About Us') }}
            </a>
            <a href="{{ route('contact') }}" class="block text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                {{ __('Contact Us') }}
            </a>
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                        {{ __('Dashboard') }}
                    </a>
                @endif
            @endauth
        </div>
        <div class="border-t border-gray-200 dark:border-gray-600 pt-4 pb-1">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
</nav>
