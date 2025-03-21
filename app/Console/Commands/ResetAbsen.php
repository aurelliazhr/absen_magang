<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ResetAbsen extends Command
{
    protected $signature = 'absen:change-status';
    protected $description = 'Mengubah status absen pulang menjadi absen datang setelah waktu tertentu';

    public function handle()
    {
        // Tentukan waktu yang diinginkan (misalnya, 17:00 WITA)
        $targetTime = Carbon::createFromTime(11, 23, 0, 'Asia/Makassar');

        // Cek apakah waktu saat ini sudah melewati waktu target
        if (now()->greaterThan($targetTime)) {
            User::where('absen_pulang', true)->update([
                'absen_datang' => true,
                'absen_pulang' => false
            ]);

            $this->info('Status absen pulang telah diubah menjadi absen datang.');
        } else {
            $this->info('Waktu belum mencapai target untuk mengubah status.');
        }
    }
}
