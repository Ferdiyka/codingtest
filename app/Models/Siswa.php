<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'nis',
        'address',
        'gender',
        'picture'
    ];

     // Relasi many-to-many dengan Eskul
     public function eskul()
     {
         return $this->belongsToMany(Eskul::class, 'eskul_siswa', 'siswa_id', 'eskul_id')
                     ->withPivot('tahun_mulai')
                     ->withTimestamps();
     }
 }
