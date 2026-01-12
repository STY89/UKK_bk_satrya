<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'pelanggarans';

    protected $fillable = [
        'user_id',
        'nama_siswa',
        'kategori',
        'keterangan',
        'poin',
        'jenis',         // <--- Ganti 'tingkat' menjadi 'jenis' agar sesuai Controller
        'jenis_kelamin',
        'status',        // <--- Tambahkan 'status' karena di Controller kamu memakainya
    ];

    /**
     * Relasi ke User (Admin/Guru yang menginput)
     */
    public function user()
    {
        // Saya sarankan ganti nama fungsi dari 'siswa' ke 'user' 
        // karena ini merujuk ke siapa yang menginput/memiliki data tersebut
        return $this->belongsTo(User::class, 'user_id');
    }
}