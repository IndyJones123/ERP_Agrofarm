<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiburModel extends Model
{
    public $table = "liburan";
    use HasFactory;
    protected $fillable = [
        'tittle',
        'deskripsi',
        'holiday_date',
    ];
}
