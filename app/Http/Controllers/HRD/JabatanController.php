<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return view('admin/HRD/jabatan');
    }
}
