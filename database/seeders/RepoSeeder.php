<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class RepoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('repos')->insert([
                'bookName' => 'bookName ' . $i,
                'warehouseLocation' => 'warehouseLocation '.$i,
                'quantityAvailable' => rand(100, 1000),
                'lastUpdated' => now(),
            ]);
        }
    }
}
