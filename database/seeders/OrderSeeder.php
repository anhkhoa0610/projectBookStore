<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 5), 
                'order_date' => now(),
                'status' => rand(1, 3), 
                'tracking_number' => rand(100000, 999999),
                'carrier' => 'Carrier ' . $i,
                'coupon_id' => rand(0, 1) ? rand(1, 5) : null,
                'total_price' => rand(50, 500) + rand(0, 99) / 100, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
