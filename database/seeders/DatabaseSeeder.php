<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Pengawas',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );

        // Petugas User
        User::firstOrCreate(
            ['email' => 'petugas@example.com'],
            [
                'name' => 'Petugas Sistem',
                'password' => bcrypt('petugas123'),
                'role' => 'petugas',
            ]
        );

        // Regular Users (Peminjam)
        User::firstOrCreate(
            ['email' => 'budi@example.com'],
            [
                'name' => 'Budi Santoso',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ]
        );

        User::firstOrCreate(
            ['email' => 'ani@example.com'],
            [
                'name' => 'Ani Wijaya',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ]
        );

        User::firstOrCreate(
            ['email' => 'citra@example.com'],
            [
                'name' => 'Citra Kusuma',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ]
        );

        // Seed Kategori first
        $this->call(KategoriSeeder::class);
        
        // Seed Alat
        $this->call(AlatSeeder::class);
    }
}
