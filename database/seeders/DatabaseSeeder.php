<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Akun Admin
        User::create([
            'name' => 'Admin Simar',
            'email' => 'admin@diskominfo.go.id',
            'password' => Hash::make('12345'),
        ]);

        // Membuat Akun User / Pegawai Biasa
        User::create([
            'name' => 'Pegawai Diskominfo',
            'email' => 'pegawai@diskominfo.go.id',
            'password' => Hash::make('12345'),
        ]);
    }
}
