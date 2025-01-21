@extends('layouts.guest')

@section('content')
<section class="bg-white py-8 dark:bg-gray-900">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Payment Form -->
                <form action="{{ route('tickets.payment.complete') }}" method="POST" class="p-6 lg:p-8">
                    @csrf
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Payment Details</h2>

                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name (as on card)</label>
                        <input type="text" id="full_name" name="full_name" value="{{ env('DUMMY_CARD_NAME', '') }}" placeholder="John Doe" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <!-- Card Number -->
                    <div class="mb-4">
                        <label for="card_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Card Number</label>
                        <input type="text" id="card_number" name="card_number" value="{{ env('DUMMY_CARD_NUMBER', '') }}" placeholder="1234-5678-9012-3456" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div class="flex gap-4">
                        <!-- Card Expiry -->
                        <div class="w-1/2">
                            <label for="card_expiry" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Expiry Date</label>
                            <input type="text" id="card_expiry" name="card_expiry" value="{{ env('DUMMY_CARD_EXPIRY', '') }}" placeholder="MM/YY" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                        </div>

                        <!-- CVV -->
                        <div class="w-1/2">
                            <label for="card_cvv" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CVV</label>
                            <input type="text" id="card_cvv" name="card_cvv" value="{{ env('DUMMY_CARD_CVV', '') }}" placeholder="123" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                        </div>
                    </div>

                    <button type="submit" class="mt-6 w-full rounded-lg bg-blue-600 py-2.5 text-white font-semibold hover:bg-blue-700 focus:ring-4 focus:ring-blue-400 focus:ring-offset-1 dark:bg-blue-500 dark:hover:bg-blue-600">
                        Pay Now
                    </button>
                </form>

                <!-- Order Summary -->
                <div class="p-6 lg:p-8 bg-gray-50 dark:bg-gray-700">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Order Summary</h2>
                
                    <ul class="space-y-4">
                        @foreach ($ticketData['categories'] as $category)
                            <li class="flex justify-between text-gray-700 dark:text-gray-300">
                                <span>{{ $category['name'] }} (x{{ $category['quantity'] }})</span>
                                <span class="font-semibold">RM {{ number_format($category['subtotal'], 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <hr class="my-6 border-gray-300 dark:border-gray-600">

                    <div class="flex justify-between text-lg font-semibold text-gray-900 dark:text-white">
                        <span>Total:</span>
                        <span>RM {{ number_format($ticketData['totalPrice'], 2) }}</span>
                    </div>

                    <div class="mt-6 flex justify-center space-x-4">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg" alt="PayPal" class="h-8">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg" alt="Visa" class="h-8">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg" alt="Mastercard" class="h-8">
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
