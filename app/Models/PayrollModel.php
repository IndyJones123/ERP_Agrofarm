<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollModel extends Model
{
    public $table = "payrollkaryawan";
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'jabatan',
        'tanggal',
        'gajipokok',
        'gajiharian',
    ];
}
