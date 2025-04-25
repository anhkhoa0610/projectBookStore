<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('products')->insert([
                'name' => 'Product ' . $i,
                'image' => null, 
                'price' => rand(100, 1000),
                'quantity' => rand(1, 50), 
                'description' => Str::random(10), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
