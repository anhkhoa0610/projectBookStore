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
        
        DB::table('publishers')->insert([
                'publisher_name' => 'Kim Đồng' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('publishers')->insert([
                'publisher_name' => 'Hội Nhà Văn' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'Văn Học' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'First News' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'NXB Trẻ' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'Phụ Nữ' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'NXB Thế Giới' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('publishers')->insert([
                'publisher_name' => 'Lao Động - Xã Hội' ,
                'contact_info' => Str::random(10) . '@example.com', // Random email-like contact info
                'address' => 'Address ' , // Simple address placeholder
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            
    }
}
