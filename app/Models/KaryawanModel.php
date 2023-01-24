<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    public $table = "karyawan";
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'jabatan',
        'notelepon',
        'photo',
        'email',
        'password',
    ];
}
