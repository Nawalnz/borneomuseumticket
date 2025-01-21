<x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
<x-nav-link href="{{ route('tickets.index') }}" :active="request()->routeIs('tickets.index')">Buy Ticket</x-nav-link>
<x-nav-link href="https://museum.sarawak.gov.my/web/subpage/webpage_view/169" target="_blank">Official Web</x-nav-link>
<x-nav-link href="{{ route('team') }}" :active="request()->routeIs('team')">Our Team</x-nav-link>
