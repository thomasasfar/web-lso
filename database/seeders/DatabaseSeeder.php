<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusSeeder::class,
            ClientSeeder::class,
            BannerSeeder::class,
            UserSeeder::class,
            DetailRuangLingkupSeeder::class,
            DetailStandardSeeder::class,
            KontakSeeder::class,
            ProfileSeeder::class
        ]);
    }
}
