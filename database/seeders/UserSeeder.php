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

        // // Tạo tài khoản admin cố định
        // DB::table('users')->insert([
        //     'full_name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password123'),
        //     'phone' => '1234567890',
        //     'address' => '123 Admin Street',
        //     'dob' => '1990-01-01',
        //     'role' => 'admin',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Tạo mảng chứa 50 user ngẫu nhiên
        $users = [];
        for ($i = 0; $i < 50; $i++) {
            $users[] = [
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
            ];
        }

        // Chia mảng users thành các chunk nhỏ  
        // để tránh lỗi khi insert quá nhiều bản ghi cùng lúc
        $chunks = array_chunk($users, 20);
        foreach ($chunks as $chunk) {
            DB::table('users')->insert($chunk);
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
