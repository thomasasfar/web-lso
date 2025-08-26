<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontaks')->insert([
            'nama' => 'alamat',
            'isi' => "Jl.Lorem ipsum dolor sit amet consectetur. Vestibulum pulvinar tincidunt vulputate",
        ]);
        DB::table('kontaks')->insert([
            'nama' => 'email',
            'isi' => "customerservice@lsosumbar.com",
        ]);
        DB::table('kontaks')->insert([
            'nama' => 'telepon',
            'isi' => "+62812892723789",
        ]);
    }
}
