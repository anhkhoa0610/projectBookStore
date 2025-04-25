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
                'order_id' => rand(1, 100), 
                'product_id' => rand(1, 50),
                'quantity' => rand(1, 10),
                'notes' => Str::random(10), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
