<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    public $table = "users";
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'nik',
        'alamat',
        'jabatan',
        'notelepon',
        'gaji',
        'photo',
    ];
}
