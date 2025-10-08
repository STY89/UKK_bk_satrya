<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'pelanggaran';

    protected $fillable = [
        'siswa_id',
        'kategori',
        'deskripsi',
        'poin',
        'tanggal'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
