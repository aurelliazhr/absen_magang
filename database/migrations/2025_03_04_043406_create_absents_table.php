<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absents', function (Blueprint $table) {
            $table->id();
            //id_siswa
            $table->timestamps();
            $table->enum('status', ['alpa', 'hadir', 'sakit', 'izin'])->default('alpa');
            $table->text('keterangan');
            $table->enum('kategori', ['datang', 'pulang'])->default('datang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absents');
    }
};
