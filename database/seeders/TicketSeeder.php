<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tickets')->insert([
            // Children
            ['category' => 'Children', 'nationality' => 'Malaysian (Sarawakian)', 'price' => 0.00],
            ['category' => 'Children', 'nationality' => 'Malaysian (Non-Sarawakian)', 'price' => 0.00],
            ['category' => 'Children', 'nationality' => 'Foreigner', 'price' => 20.00],

            // Student
            ['category' => 'Student', 'nationality' => 'Malaysian (Sarawakian)', 'price' => 5.00],
            ['category' => 'Student', 'nationality' => 'Malaysian (Non-Sarawakian)', 'price' => 5.00],
            ['category' => 'Student', 'nationality' => 'Foreigner', 'price' => 25.00],

            // Adult
            ['category' => 'Adult', 'nationality' => 'Malaysian (Sarawakian)', 'price' => 10.00],
            ['category' => 'Adult', 'nationality' => 'Malaysian (Non-Sarawakian)', 'price' => 20.00],
            ['category' => 'Adult', 'nationality' => 'Foreigner', 'price' => 50.00],

            // Senior
            ['category' => 'Senior', 'nationality' => 'Malaysian (Sarawakian)', 'price' => 5.00],
            ['category' => 'Senior', 'nationality' => 'Malaysian (Non-Sarawakian)', 'price' => 10.00],
            ['category' => 'Senior', 'nationality' => 'Foreigner', 'price' => 25.00],
        ]);
    }
}
