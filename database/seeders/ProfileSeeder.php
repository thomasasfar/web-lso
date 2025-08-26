<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tentangs')->insert([
            'judul' => 'profil',
            'konten' => '<p>ini konten profil</p><ol><li>as</li></ol>',
            'image' => '1.jpg'
        ]);
        DB::table('tentangs')->insert([
            'judul' => 'visi',
            'konten' => '<div>Tewujudnya Sumatera Barat Madani yang Unggul dan Berkelanjutan</div>',
            'image' => '1.jpg'
        ]);
        DB::table('tentangs')->insert([
            'judul' => 'misi',
            'konten' => "<ol><li>Meningkatkan kualitas sumber daya manusia yang sehat,&nbsp;berpengetahuan, terampil dan berdaya saing.</li><li>Meningkatkan tata kehidupan sosial kemasyarakatan berdasarkan Falsafah Adaiak Basandi Syara Syara' Basandi Kitabullah</li><li>Meningkatkan nilai tambah dan produktifitas pertanian, perkebunan, perternakan dan perikanan</li><li>Meningkatkan usaha perdagangan dan industri kecil/menengah serta ekonomi berbasis digital</li><li>Meningkatkan ekonomi kreatif dan daya saing kepariwisataan</li><li>Meningkatkan pembangunan infrastruktur yang berkeadilan dan berkelanjutan</li><li>Mewujudkan tata kelola pemerintah dan pelayanan publik yang bersih, akuntabel serta berkualitas</li></ol>",
            'image' => '1.jpg'
        ]);
        DB::table('tentangs')->insert([
            'judul' => 'sejarah',
            'konten' => '<p><b>ini konten sejarah</b></p><ul><li><b>1</b></li></ul>',
            'image' => '1.jpg'
        ]);

    }
}
