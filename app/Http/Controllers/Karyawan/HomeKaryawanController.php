<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;


class HomeKaryawanController extends Controller
{
    public function index()
    {
        return view('Karyawan.home');
    }
}
