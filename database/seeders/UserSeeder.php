<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Khởi tạo Faker để tạo dữ liệu giả
        $faker = Faker::create();

        // Tạo mảng chứa 50 user ngẫu nhiên
        for ($i = 0; $i < 50; $i++) {
             DB::table('users')->insert( [
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $this->generatePhoneNumber($faker),
                'address' => $faker->address,
                'dob' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'role' => $faker->randomElement(['user', 'manager', 'admin']),
                'is_active' => $faker->boolean(90),
                'created_at' => now(),
                'updated_at' => now(),
           ]);
            
        }

    }
    /**
     * Tạo số điện thoại ngẫu nhiên gồm 10 chữ số
     *
     * @param \Faker\Generator $faker
     * @return string
     */
    protected function generatePhoneNumber($faker)
    {
        return $faker->numerify('##########');
    }
}
