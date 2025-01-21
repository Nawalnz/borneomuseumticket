<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['name' => 'Malaysian child', 'description' => 'Below 12 years old', 'price' => 0]);
        Category::create(['name' => 'Non-Malaysian child', 'description' => 'Below 12 years old', 'price' => 20]);
        Category::create(['name' => 'Malaysian student', 'description' => '13-17 years old OR University student with ID', 'price' => 5]);
        Category::create(['name' => 'Non-Malaysian student', 'description' => '13-17 years old OR University student with ID', 'price' => 25]);
        Category::create(['name' => 'Sarawakian Adult', 'description' => '18-60 years old (Malaysian IC must be presented for entry)', 'price' =>10]);
        Category::create(['name' => 'Non-Sarawakian Adult', 'description' => '18-60 years old (Malaysian IC must be presented for entry)', 'price' =>20]);
        Category::create(['name' => 'Non-Malaysian Adult', 'description' => '18-60 years old', 'price' =>50]);
        Category::create(['name' => 'Sarawakian Senior', 'description' => 'Above 60 years old (Malaysian IC must be presented for entry)', 'price' =>5]);
        Category::create(['name' => 'Non-Sarawakian Senior', 'description' => 'Above 60 years old (Malaysian IC must be presented for entry)', 'price' =>10]);
        Category::create(['name' => 'Non-Malaysian Senior', 'description' => 'Above 60 years old', 'price' =>25]);
        Category::create(['name' => 'Disabled / OKU', 'description' => 'Disabled Person registered with National Welfare Department', 'price' => 0]);
        Category::create(['name' => 'Annual Pass', 'description' => 'Annual unlimited visit', 'price' => 100]);
        Category::create(['name' => 'Sarawakian Group Purchase', 'description' => 'More than 10 person OR registered corporate rate (price per head, IC needed)', 'price' => 8]);
        Category::create(['name' => 'Non-Sarawakian Group Purchase', 'description' => 'More than 10 person OR registered corporate rate (price per head, IC needed)', 'price' => 16]);
        Category::create(['name' => 'Non-Malaysian Group Purchase', 'description' => 'More than 10 person OR registered corporate rate (price per head)', 'price' => 40]);
    }
}
