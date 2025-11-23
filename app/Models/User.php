<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Kelas;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'kelas_id', // kalau ada relasinya
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ============================
    // Tambahan relasi
    // ============================

    public function pelanggarans()
    {
    return $this->hasMany(Pelanggaran::class, 'user_id'); // sama dengan kolom FK di tabel
    }

    public function kelas()
    {
    return $this->belongsTo(Kelas::class, 'kelas_id'); 
    }

    public function rombel() {
        return $this->belongsTo(Rombel::class, 'rombel_id');
    }

}
