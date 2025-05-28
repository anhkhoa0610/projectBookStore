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
            BookSeeder::class,
            PublisherSeeder::class,
            OrderDetailSeeder::class,
            OrderSeeder::class,
            CategoriesSeeder::class,
            AuthorSeeder::class,
            RepoSeeder::class,
            CouponSeeder::class,
            UserSeeder::class,
            ReviewSeeder::class,
            CategoryBookSeeder::class,
            RepoBookSeeder::class,
            CartDBSeeder::class,
            WishlistSeeder::class
        ]);
    }
}
