<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranLogModel extends Model
{
    use HasFactory;
    public $table = "logkehadiran";
    protected $fillable = [
        'namakaryawan',
        'jabatan',
        'tanggal',
        'absenmasuk',
        'absenkeluar',
        'status',
        'keterangan',
    ];
}
