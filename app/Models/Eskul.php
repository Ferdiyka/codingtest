<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $table = 'eskul';

    protected $fillable = [
        'nama_eskul',
        'jenis_eskul',
    ];

     // Relasi many-to-many dengan Siswa
     public function siswa()
     {
         return $this->belongsToMany(Siswa::class, 'eskul_siswa', 'eskul_id', 'siswa_id')
                     ->withPivot('tahun_mulai')
                     ->withTimestamps();
     }
}
