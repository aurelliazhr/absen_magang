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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained(
                table: 'users',
                indexName: 'scores_users_id'
            );
            $table->foreignId('id_tasks')->constrained(
                table: 'tasks',
                indexName: 'scores_tasks_id'
            );
            $table->foreignId('id_assignments')->constrained(
                table: 'assignments',
                indexName: 'scores_assignments_id'
            );
            $table->integer('nilai');
            $table->string('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
