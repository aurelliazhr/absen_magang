<?php

namespace Database\Seeders;

use App\Models\Absent;
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
            'nama' => 'Guru Pembimbing',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('guru')
        ]);

        User::create([
            'nama' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('siswa'),
            'asal_sekolah' => 'SMKN 2 Banjarmasin',
            'jenis_kelamin' => 'Laki-Laki',
            'id_teachers' => '1'
        ]);

        Task::create([
            'id_teachers' => '1',
            'judul' => 'Tugas Kesekian',
            'deskripsi' => 'Ini adalah tugas pertama. Silahkan kerjakan!',
            'batas_pengumpulan' => '2025-03-31 12:00:00 ' 
        ]);

        Absent::create([
            'id_users' => '1',
            'status' => 'hadir',
            'keterangan' => 'Hadir tepat waktu',
            'kategori' => 'datang'
        ]);
    }
}
