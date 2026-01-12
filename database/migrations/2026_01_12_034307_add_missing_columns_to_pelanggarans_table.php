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
    Schema::table('pelanggarans', function (Blueprint $table) {
        // Kita tambah kolom yang belum ada saja
        if (!Schema::hasColumn('pelanggarans', 'jenis_kelamin')) {
            $table->string('jenis_kelamin')->nullable()->after('nama_siswa');
        }
        if (!Schema::hasColumn('pelanggarans', 'poin')) {
            $table->integer('poin')->default(0)->after('keterangan');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelanggarans', function (Blueprint $table) {
            //
        });
    }
};
