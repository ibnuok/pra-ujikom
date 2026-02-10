<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::firstOrCreate(
            ['nama_kategori' => 'Laptop'],
            ['nama_kategori' => 'Laptop']
        );

        Kategori::firstOrCreate(
            ['nama_kategori' => 'Proyektor'],
            ['nama_kategori' => 'Proyektor']
        );
    }
}
