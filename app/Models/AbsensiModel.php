<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    public $table = "absensi";
    use HasFactory;
    public $fillable = ['tittle', 'hari', 'jabatan', 'tempat', 'longtitude', 'latitude', 'jarak', 'start_time', 'batas_start_time', 'end_time', 'batas_end_time'];
}
