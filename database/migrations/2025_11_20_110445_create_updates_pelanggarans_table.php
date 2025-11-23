<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pelanggarans', function (Blueprint $table) {
            // biarkan user_id nullable
            $table->unsignedBigInteger('user_id')->nullable()->change();

            // tambah kolom baru kalau belum ada
            if (!Schema::hasColumn('pelanggarans', 'nama_siswa')) {
                $table->string('nama_siswa')->nullable();
            }

            if (!Schema::hasColumn('pelanggarans', 'poin')) {
                $table->integer('poin')->default(0);
            }

            if (!Schema::hasColumn('pelanggarans', 'status')) {
                $table->string('status')->default('Belum Ditindak');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pelanggarans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            if (Schema::hasColumn('pelanggarans', 'nama_siswa')) {
                $table->dropColumn('nama_siswa');
            }
            if (Schema::hasColumn('pelanggarans', 'poin')) {
                $table->dropColumn('poin');
            }
            if (Schema::hasColumn('pelanggarans', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
