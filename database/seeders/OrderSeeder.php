<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 100), 
                'total_amount' => rand(100, 1000), 
                'address' => 'Address ' . $i, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
