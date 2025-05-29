<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('orders_detail')->insert([
                'order_id' => rand(1, 10), // Random order_id between 1 and 10
                'book_id' => rand(1, 20), // Random product_id between 1 and 20
                'quantity' => rand(1, 5), // Random quantity between 1 and 5
                'price' => rand(10, 100) + rand(0, 99) / 100, // Random price with 2 decimals
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
