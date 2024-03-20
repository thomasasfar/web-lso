<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailStandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_standards')->insert([
            'id_client' => 1,
            'id_standard' => 1
        ]);
        DB::table('detail_standards')->insert([
            'id_client' => 2,
            'id_standard' => 1
        ]);
    }
}
