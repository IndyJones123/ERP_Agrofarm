<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terlambat extends Model
{
    public $table = "terlambat";
    use HasFactory;
    protected $fillable = [
        'namakaryawan',
        'jabatan',
        'tanggal',
        'keterangan',
        'atasan',
    ];
}
