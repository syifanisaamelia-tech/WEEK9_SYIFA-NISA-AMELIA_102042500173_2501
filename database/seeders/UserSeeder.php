<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Akademik',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dosen Pengampu',
            'email' => 'dosen@test.com',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        User::create([
            'name' => 'Mahasiswa Telkom',
            'email' => 'mahasiswa@test.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);
    }
}