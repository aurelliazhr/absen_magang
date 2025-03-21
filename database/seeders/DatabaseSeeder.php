<?php

namespace Database\Seeders;

use App\Models\Absent;
use App\Models\Admin;
use App\Models\Assignment;
use App\Models\Score;
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
            'judul' => 'Tugas 1',
            'deskripsi' => 'Ini adalah tugas pertama. Silahkan kerjakan!',
            'batas_pengumpulan' => '2025-03-31 12:00:00 ' 
        ]);

        Task::create([
            'id_teachers' => '2',
            'judul' => 'Tugas 2',
            'deskripsi' => 'Ini adalah tugas pertama. Silahkan kerjakan!',
            'batas_pengumpulan' => '2025-05-31 12:00:00 ' 
        ]);

        Absent::create([
            'id_users' => '1',
            'status' => 'hadir',
            'keterangan' => 'Hadir tepat waktu',
            'kategori' => 'datang'
        ]);

        Assignment::create([
            'id_tasks' => '1',
            'id_users' => '1',
            'judul' => 'Pengumpulan Tugas 1'
        ]);

        Assignment::create([
            'id_tasks' => '2',
            'id_users' => '2',
            'judul' => 'Pengumpulan Tugas 2'
        ]);

        Score::create([
            'id_users' => '1',
            'id_tasks' => '1',
            'id_assignments' => '1',
            'nilai' => '100',
            'catatan' => 'Siswa mengerjakan dengan baik'
        ]);
    }
}
