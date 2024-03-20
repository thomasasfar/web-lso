<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailRuangLingkupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_ruang_lingkups')->insert([
            'id_client' => 1,
            'id_ruang_lingkup' => 1
        ]);
        DB::table('detail_ruang_lingkups')->insert([
            'id_client' => 2,
            'id_ruang_lingkup' => 1
        ]);
        DB::table('detail_ruang_lingkups')->insert([
            'id_client' => 1,
            'id_ruang_lingkup' => 2
        ]);
        DB::table('detail_ruang_lingkups')->insert([
            'id_client' => 1,
            'id_ruang_lingkup' => 3
        ]);
    }
}
