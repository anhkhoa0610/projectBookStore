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
        

        DB::table('authors')->insert([
            'author_name' => 'Tô Hoài', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Phùng Quán', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Bảo Ninh', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Vũ Trọng Phụng', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Du', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Minh Niệm', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Nhật Ánh', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Dương Thu Hương', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Tuân', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Nhật Ánh', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Tony Buổi Sáng', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Adam Khoo', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Di Li', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Kevin Paul', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Như Mai', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Sỹ Công', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Phạm Thanh Tâm', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Hải Anh', // Tên tác giả dạng "Author 1", "Author 2", ...
            'bio' => null, // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
