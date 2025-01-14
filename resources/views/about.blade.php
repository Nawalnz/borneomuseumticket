@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold text-center mt-8">About Us</h1>
    <p class="text-center mt-4">Learn more about the Borneo Cultural Museum and our mission.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
        <!-- Add team members here -->
        <div class="text-center">
            <img src="/path-to-team-member1.jpg" alt="Team Member" class="team-photo mx-auto">
            <h2 class="font-semibold mt-4">Team Member Name</h2>
            <p>Role/Position</p>
        </div>
        <!-- Repeat for other members -->
    </div>
</div>
@endsection
