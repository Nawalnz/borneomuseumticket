@extends('layouts.guest')

@section('content')
<section id="ticketing" class="container mt-5">
    <h2 class="text-center text-2xl font-bold mb-5">Book Your Tickets HERE!</h2>
    
    <!-- Booking Form -->
    <form id="bookingForm" method="POST" action="{{ route('tickets.store') }}" class="bg-gray-100 p-6 rounded shadow-md">
        @csrf <!-- Laravel CSRF protection -->

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your Full Name" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your Email" required>
        </div>

        <!-- Date of Visit -->
        <div class="mb-4">
            <label for="date" class="block text-lg font-medium text-gray-700">Date of Visit</label>
            <input type="date" name="date" id="date" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Ticket Categories -->
        <div id="categories-container">
            <div class="category-group flex items-center space-x-4 mb-4">
                <select name="categories[0][category]" id="categories[0][category]" class="form-select flex-1 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="" disabled selected>Select your Category</option>
                    @foreach ($categories as $index => $category)
                        @if ($index <= 12)
                            <option value="{{ $category->id }}">
                                {{ $category->name }} - RM {{ $category->price }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <input type="number" name="categories[0][quantity]" min="1" placeholder="Qty" class="form-control w-20 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        </div>

        <button type="button" id="add-category" class="btn btn-secondary px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mb-4">
            Add Another Category
        </button>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Book Tickets</button>
    </form>

    <!-- Separate Purchase Button -->
    <div class="mt-6">
        <h3 class="text-lg font-bold">For Bulk or Corporate Purchases:</h3>
        <p class="text-gray-600">For tickets involving more than 10 adults or corporate rates, please use the dedicated page:</p>
        <a href="{{ route('tickets.bulk') }}" class="btn btn-secondary px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 mt-3 inline-block">Go to Bulk Purchase Page</a>
    </div>
</section>
@endsection

<script>
    let categoryIndex = 1; // Track dynamic index for categories
    document.getElementById('add-category').addEventListener('click', function () {
        const container = document.getElementById('categories-container');
        const newRow = `
            <div class="category-group flex items-center space-x-4 mb-4">
                <select name="categories[${categoryIndex}][category]" class="form-select flex-1 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="" disabled selected>Select your Category</option>
                    @foreach ($categories as $index => $category)
                        @if ($index <= 12)
                            <option value="{{ $category->id }}">
                                {{ $category->name }} - RM {{ $category->price }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <input type="number" name="categories[${categoryIndex}][quantity]" min="1" placeholder="Qty" class="form-control w-20 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newRow);
        categoryIndex++;
    });
</script>
