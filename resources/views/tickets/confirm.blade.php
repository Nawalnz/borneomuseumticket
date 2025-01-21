@extends('layouts.guest')

@section('content')
<section id="confirmation" class="container mt-5">
    <h2 class="text-center text-2xl font-bold mb-5">Confirm Your Purchase</h2>

    <div class="bg-gray-100 p-6 rounded shadow-md">
        <h3 class="text-lg font-medium mb-3">Personal Details:</h3>
        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Date of Visit:</strong> {{ $date }}</p>

        <h3 class="text-lg font-medium mt-5 mb-3">Ticket Details:</h3>
        <ul>
            @foreach ($categories as $category)
                <li>
                    {{ $category['name'] }} - RM {{ number_format($category['price'], 2) }} x {{ $category['quantity'] }} = RM {{ number_format($category['subtotal'], 2) }}
                </li>
            @endforeach
        </ul>
        <p class="mt-4 font-bold">Total: RM {{ number_format($totalPrice, 2) }}</p>
    </div>

    <div class="flex justify-end mt-5">
        <a href="{{ route('tickets.payment') }}" class="btn btn-primary px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
            Proceed to Payment
        </a>
    </div>
</section>
@endsection
