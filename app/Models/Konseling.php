<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    protected $fillable = [
        'nama', 'kelas', 'absen', 'masalah', 'tanggal', 'status'
    ];
}

