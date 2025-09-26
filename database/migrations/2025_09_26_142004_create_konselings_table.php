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
        Schema::create('konselings', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // judul pengajuan
            $table->text('deskripsi'); // deskripsi masalah
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // siapa yang buat
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending'); // status konseling
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konselings');
    }
};
