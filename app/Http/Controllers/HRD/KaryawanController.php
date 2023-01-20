<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\KaryawanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search1')) {
            $data = KaryawanModel::where('nama', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = KaryawanModel::where('Email', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search3')) {
            $data = KaryawanModel::where('Jabatan', 'LIKE', '%' . $request->search3 . '%')->get();
        } else {
            $data = KaryawanModel::all();
        }
        return View('admin/HRD/karyawan/karyawan', compact(["data"]));
    }
    public function create_karyawan()
    {
        $data = KaryawanModel::all();
        return View('admin/HRD/karyawan/addkaryawan', compact(["data"]));
    }
    public function store(Request $request)
    {
        $namakaryawan = $request->input('namakaryawan');
        $minimalgaji = $request->input('minimalgaji');
        $maksimalgaji = $request->input('maksimalgaji');

        $data = DB::table('karyawan')
            ->insert([
                'namakaryawan' => $namakaryawan,
                'minimalgaji' => $minimalgaji,
                'maksimalgaji' => $maksimalgaji,
            ]);
        $data = KaryawanModel::all();
        return View('admin.HRD.karyawan.karyawan', compact(["data"]));
    }
    public function edit($id)
    {
        $data = KaryawanModel::find($id);
        $create_karyawan = [
            'id' => $id,
            'namakaryawan' => $data->namakaryawan,
            'minimalgaji' => $data->minimalgaji,
            'maksimalgaji' => $data->maksimalgaji,
        ];
        return view('admin.HRD.karyawan.editkaryawan', $create_karyawan);
    }
    public function update($id, Request $request)
    {
        $namakaryawan = $request->input('namakaryawan');
        $minimalgaji = $request->input('minimalgaji');
        $maksimalgaji = $request->input('maksimalgaji');

        $data = KaryawanModel::find($id);

        $data = KaryawanModel::where('id', $id)
            ->update([
                'namakaryawan' => $namakaryawan,
                'minimalgaji' => $minimalgaji,
                'maksimalgaji' => $maksimalgaji,
            ]);
        $data = KaryawanModel::all();
        return View('admin.HRD.karyawan.karyawan', compact(["data"]));
    }
    public function delete($id)
    {
        $data = KaryawanModel::find($id);
        $data->delete();
        $data = KaryawanModel::all();
        return View('admin.HRD.karyawan.karyawan', compact(["data"]));
    }
}
