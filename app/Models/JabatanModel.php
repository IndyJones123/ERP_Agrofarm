<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanModel extends Model
{
    public $table = "jabatan";
    use HasFactory;
    public $fillable = ['namajabatan', 'minimalgaji', 'maksimalgaji'];
}
