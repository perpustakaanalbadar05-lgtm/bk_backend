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
        \App\Models\User::factory()->create([
            'name' => 'Guru BK',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        // Students
        \App\Models\Student::create([
            'nama' => 'Ahmad Fauzi', 'nis' => '2024001', 'kelas' => 'XI IPA 2', 'jk' => 'L', 'status' => 'Aktif', 'konseling' => 3, 'hp' => '081234567890', 'alamat' => 'Jl. Merdeka No. 12, Jakarta'
        ]);
        \App\Models\Student::create([
            'nama' => 'Siti Rahma', 'nis' => '2024002', 'kelas' => 'X IPS 1', 'jk' => 'P', 'status' => 'Aktif', 'konseling' => 1, 'hp' => '082345678901', 'alamat' => 'Jl. Sudirman No. 45, Jakarta'
        ]);
        \App\Models\Student::create([
            'nama' => 'Budi Santoso', 'nis' => '2024003', 'kelas' => 'XII IPA 1', 'jk' => 'L', 'status' => 'Aktif', 'konseling' => 5, 'hp' => '083456789012', 'alamat' => 'Jl. Gatot Subroto No. 7, Jakarta'
        ]);
    }
}
