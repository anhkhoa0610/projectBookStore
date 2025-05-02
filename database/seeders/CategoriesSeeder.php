<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('categories')->insert([
                'category_name' => 'category name ' . $i,
                'category_desc' => Str::random(50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
