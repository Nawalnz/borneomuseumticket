<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    public function run()
    {
        Ticket::create([
            'reservation_id' => 1, // Link to reservation ID
            'type' => 'Sarawakian Kids',
            'price' => 0.00,
            'quantity' => 2,
            'total_amount' => 0.00,
        ]);

        Ticket::create([
            'reservation_id' => 1,
            'type' => 'Non-Sarawakian Adults',
            'price' => 20.00,
            'quantity' => 3,
            'total_amount' => 60.00,
        ]);
    }
}
