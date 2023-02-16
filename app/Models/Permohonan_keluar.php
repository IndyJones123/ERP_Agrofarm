<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan_keluar extends Model
{
    public $table = "Permohonan_keluar";
    use HasFactory;
    protected $fillable = [
        'namakaryawan',
        'jabatan',
        'tanggal',
        'keterangan',
        'atasan',
        'foto',
    ];
}
