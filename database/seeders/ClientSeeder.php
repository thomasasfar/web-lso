<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruang_lingkups')->insert([
            'nama' => 'Hortikultura'
        ]);
        DB::table('ruang_lingkups')->insert([
            'nama' => 'Tanaman Pangan'
        ]);
        DB::table('ruang_lingkups')->insert([
            'nama' => 'Produk Olahan'
        ]);

        DB::table('standards')->insert([
            'nama_standar' => 'SNI 6729 : 2016'
        ]);

        DB::table('clients')->insert([
            'nama' => 'Rumah Tani Tom',
            'alamat' => 'Jalan yuk',
            'kontak' => 'Thomas Nobel',
            'telepon' => '081277631122',
            'email' => 'thomas@nobel.tom',
            'validasi' => '31-01-2024',
            'nomor_sertifikat' => '475-LSPr-092-IDN-12-22',
            'tanggal_mulai_berlaku' => '31-01-2024',
            'tanggal_habis_berlaku' => '31-01-2026',
            'id_status' => '2',
            'image' => '1.jpg'
        ]);
        DB::table('clients')->insert([
            'nama' => 'Pertanian Nobel',
            'alamat' => 'Jalan bareng aku aja',
            'kontak' => 'Thomas Asfar',
            'telepon' => '081277631122',
            'email' => 'thomas@nobel.tom',
            'validasi' => '31-01-2024',
            'nomor_sertifikat' => '476-LSPr-092-IDN-12-22',
            'tanggal_mulai_berlaku' => '31-01-2024',
            'tanggal_habis_berlaku' => '31-01-2026',
            'id_status' => 1,
            'image' => '1.jpg'
        ]);
    }
}
