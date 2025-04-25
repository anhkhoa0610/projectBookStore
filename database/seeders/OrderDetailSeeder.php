<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 300; $i++) {
            DB::table('order_details')->insert([
                'order_id' => rand(1, 100), // Assuming you have 100 orders
                'product_id' => rand(1, 50), // Assuming you have 50 products
                'quantity' => rand(1, 10), // Random quantity between 1 and 10
                'notes' => Str::random(10), // Random price between 50 and 500
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
