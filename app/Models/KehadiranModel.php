<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranModel extends Model
{
    public $table = "kehadiran";
    use HasFactory;
    protected $fillable = [
        'namapegawai',
        'bulan',
        'nik',
        'jabatan',
        'sakit',
        'izin',
        'alpha',
        'cuti',
        'dinasluar',
        'terlambat',
        'hadir',
        'wajibhadir',
        'sisacuti',
        'keterangan',
    ];
}
