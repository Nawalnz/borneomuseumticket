@extends('layouts.guest')

@section('content')
<section id="bulk-ticketing" class="container mt-5">
    <h2 class="text-center text-2xl font-bold mb-5">Bulk and Corporate Ticket Purchase</h2>
    
    <form method="POST" action="{{ route('tickets.bulk.store') }}" class="bg-gray-100 p-6 rounded shadow-md">
        @csrf

        <!-- Add similar fields as in the main form -->

        <!-- Bulk Categories -->
        <div class="mb-4">
            <label for="category" class="block text-lg font-medium text-gray-700">Category</label>
            <select name="category" id="category" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>Select your Bulk Category</option>
                @foreach ($bulkCategories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->description }} - RM {{ $category->price }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Book Bulk Tickets
        </button>
    </form>
</section>
@endsection
