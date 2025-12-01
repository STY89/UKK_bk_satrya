<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('konselings', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('kelas');
        $table->integer('absen');
        $table->text('masalah');
        $table->date('tanggal');
        $table->string('status')->default('pending'); // pending / disetujui
        $table->timestamps();
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
