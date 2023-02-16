<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan_dinasluar extends Model
{
    public $table = "Permohonan_dinasluar";
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
