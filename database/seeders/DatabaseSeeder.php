<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Task;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        Teacher::create([
            'nama' => 'Guru Pembimbing 1',
            'email' => 'guru1@gmail.com',
            'password' => Hash::make('guru')
        ]);

        Teacher::create([
            'nama' => 'Guru Pembimbing 2',
            'email' => 'guru2@gmail.com',
            'password' => Hash::make('guru')
        ]);

        User::create([
            'nama' => 'Siswa 1',
            'email' => 'siswa1@gmail.com',
            'password' => Hash::make('siswa'),
            'asal_sekolah' => 'SMKN 2 Banjarmasin',
            'jenis_kelamin' => 'Laki-Laki',
            'id_teachers' => '1'
        ]);

        User::create([
            'nama' => 'Siswa 2',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('siswa'),
            'asal_sekolah' => 'SMKN 2 Banjarmasin',
            'jenis_kelamin' => 'Perempuan',
            'id_teachers' => '2'
        ]);

        Task::create([
            'id_teachers' => '1',
            'judul' => 'Tugas Pertama',
            'deskripsi' => 'Ini adalah tugas pertama. Silahkan kerjakan!',
            'batas_pengumpulan' => '2025-03-31 12:00:00 ' 
        ]);

        Task::create([
            'id_teachers' => '2',
            'judul' => 'Tugas Kedua',
            'deskripsi' => 'Ini adalah tugas kedua, silahkan kerjakan!',
            'batas_pengumpulan' => '2025-03-31 12:00:00 ' 
        ]);
    }
}
