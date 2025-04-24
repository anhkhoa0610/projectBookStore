<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('books')->insert([
                'title' => 'Book Title ' . $i,
                'summary' => Str::random(50),
                'author_id' => rand(1, 5), // Assuming you have 5 authors
                'category_id' => rand(1, 5), // Assuming you have 5 categories
                'publisher_id' => rand(1, 5), // Assuming you have 5 publishers
                'description' => Str::random(100),
                'price' => rand(100, 1000), // Random price between 100 and 1000
                'cover_image' => null, // You can add logic for images if needed
                'volume_sold' => rand(0, 500), // Random volume sold
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
