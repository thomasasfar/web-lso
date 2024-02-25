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
            'gambar' => '1.jpg',
        ]);
        DB::table('banners')->insert([
            'gambar' => '2.jpg',
        ]);
        DB::table('banners')->insert([
            'gambar' => '3.jpg',
        ]);
    }
}