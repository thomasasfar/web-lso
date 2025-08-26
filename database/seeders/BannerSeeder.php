<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'image' => '1.jpg',
        ]);
        DB::table('banners')->insert([
            'image' => '2.jpg',
        ]);
        DB::table('banners')->insert([
            'image' => '3.jpg',
        ]);
    }
}
