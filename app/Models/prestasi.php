<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = ['nama_siswa','judul_prestasi','tingkat','foto','keterangan'];
    
    // hapus fungsi siswa() karena tidak ada relasi
}
