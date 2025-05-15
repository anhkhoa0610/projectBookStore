<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i <= 50; $i++) {
            DB::table('reviews')->insert([
                'user_id' => $faker->numberBetween(1, 20),  
                'book_id' => $faker->numberBetween(1, 100),  
                'rating' => $faker->numberBetween(1, 5),  
                'comment' => $faker->sentence($nbWords = 10),  
                'date_review' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), 
            ]);
        }
    }
}
