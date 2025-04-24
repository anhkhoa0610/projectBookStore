<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('publishers')->insert([
                'publisher_name' => 'Publisher ' . $i,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
