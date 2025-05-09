<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
<<<<<<< HEAD
            BookSeeder::class,PublisherSeeder::class,RepoSeeder::class,
=======
            BookSeeder::class,PublisherSeeder::class,OrderDetailSeeder::class,OrderSeeder::class,CategoriesSeeder::class
>>>>>>> Search_for_cate_and_oder
        ]);
    }
}
