<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('landingpage');
    }

    public function detail1()
    {
        return view('detailproduk/detailproducts');
    }
}
