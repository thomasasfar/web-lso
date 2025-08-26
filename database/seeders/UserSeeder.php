<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'superadmin',
            'password' => bcrypt('123456'),
            'nama' => 'superadmin',
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'username' => 'operator',
            'password' => bcrypt('123456'),
            'nama' => 'operator',
            'role' => 'operator'
        ]);
    }
}
