<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'pelanggarans'; // wajib sesuai nama tabel di DB

    protected $fillable = [
        'user_id',   // kolom foreign key
        'nama_siswa',
        'kategori',
        'keterangan',
        'poin',
        'status',
        'jenis',
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id'); // pastikan sesuai kolom FK
    }
}
