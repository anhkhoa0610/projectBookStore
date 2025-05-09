<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 50; $i++) {
            DB::table('authors')->insert([
                'author_name' => 'Author ' . $i, // Tên tác giả dạng "Author 1", "Author 2", ...
                'bio' => 'This is a short bio for Author ' . $i, // Tiểu sử ngắn cho tác giả
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
