<?php

namespace Database\Seeders;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get atau create categories
        $kategoriLaptop = Kategori::firstOrCreate(['nama_kategori' => 'Laptop']);
        $kategoriProyektor = Kategori::firstOrCreate(['nama_kategori' => 'Proyektor']);

        // Create alat untuk Kategori Laptop
        Alat::create([
            'nama_alat' => 'Dell Inspiron 15',
            'kategori_id' => $kategoriLaptop->id,
            'stok' => 3,
            'kondisi' => 'Baik',
        ]);

        Alat::create([
            'nama_alat' => 'HP Pavilion 14',
            'kategori_id' => $kategoriLaptop->id,
            'stok' => 2,
            'kondisi' => 'Baik',
        ]);

        Alat::create([
            'nama_alat' => 'Lenovo ThinkPad',
            'kategori_id' => $kategoriLaptop->id,
            'stok' => 2,
            'kondisi' => 'Baik',
        ]);

        // Create alat untuk Kategori Proyektor
        Alat::create([
            'nama_alat' => 'Epson EB-X05',
            'kategori_id' => $kategoriProyektor->id,
            'stok' => 2,
            'kondisi' => 'Baik',
        ]);

        Alat::create([
            'nama_alat' => 'BenQ MH534',
            'kategori_id' => $kategoriProyektor->id,
            'stok' => 1,
            'kondisi' => 'Baik',
        ]);
    }
}

