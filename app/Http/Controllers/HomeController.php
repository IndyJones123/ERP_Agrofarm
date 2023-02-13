<?php

namespace App\Http\Controllers;

use App\Models\nomerketerlambatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('hakakses');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function hakakses()
    {
        return view('admin/HRD/home');
    }
    public function guest()
    {
        return view('landingpages');
    }
    public function checksurat(Request $request)
    {
        if ($request->has('search1')) {
            $data = nomerketerlambatan::where('nomerketerlambatan', 'LIKE', '%' . $request->search1 . '%')->get();
        } else {
            $data = nomerketerlambatan::all();
        }
        return View('checknomer', compact(["data"]));
    }
    public function profile()
    {
        $data = Auth::user()->all;
        return View('Profile', compact(["data"]));
    }
}
