<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'nama' => 'Sertifikat Berlaku'
        ]);
        DB::table('statuses')->insert([
            'nama' => 'Masa Berlaku Sertifikat Habis'
        ]);
    }
}
