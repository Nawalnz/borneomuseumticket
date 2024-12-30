<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        Reservation::create([
            'reservation_number' => 'RES12345',
            'customer_email' => 'customer@example.com',
            'status' => 'pending',
            'total_amount' => 0, // Will update after adding tickets
            'payment_method' => 'spay',
        ]);
    }
}

