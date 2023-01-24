<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $email = $request->input('email');
        $jabatan = $request->input('jabatan');
        $alamat = $request->input('alamat');
        $photo = $request->input('photo');
        $role = $request->input('role');
        $notelepon = $request->input('notelepon');



        $data = DB::table('karyawan')
            ->insert([
                'nik' => $nik,
                'nama' => $nama,
                'email' => $email,
                'jabatan' => $jabatan,
                'alamat' => $alamat,
                'photo' => $photo,
                'role' => $role,
                'notelepon' => $notelepon,
                'password' => Hash::make('123'),
            ]);

        $data = DB::table('users')
            ->insert([
                'nik' => $nik,
                'name' => $nama,
                'email' => $email,
                'jabatan' => $jabatan,
                'alamat' => $alamat,
                'photo' => $photo,
                'role' => $role,
                'notelepon' => $notelepon,
                'password' => Hash::make('123'),
            ]);

        $data = KaryawanModel::all();
        return View('admin.HRD.karyawan.karyawan', compact(["data"]));
    }
    public function edit($id)
    {
        $data = KaryawanModel::find($id);
        $create_karyawan = [
            'id' => $id,
            'nik' => $data->nik,
            'nama' => $data->nama,
            'email' => $data->email,
            'jabatan' => $data->jabatan,
            'alamat' => $data->alamat,
            'photo' => $data->photo,
            'role' => $data->role,
            'notelepon' => $data->notelepon,
        ];

        return view('admin.HRD.karyawan.editkaryawan', $create_karyawan);
    }
    public function update($id, Request $request)
    {
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $email = $request->input('email');
        $jabatan = $request->input('jabatan');
        $alamat = $request->input('alamat');
        $photo = $request->input('photo');
        $role = $request->input('role');
        $notelepon = $request->input('notelepon');


        $data = KaryawanModel::find($id);

        $data = KaryawanModel::where('id', $id)
            ->update([
                'nik' => $nik,
                'nama' => $nama,
                'email' => $email,
                'jabatan' => $jabatan,
                'alamat' => $alamat,
                'photo' => $photo,
                'role' => $role,
                'notelepon' => $notelepon,
            ]);

        $data2 = User::find($nik);

        $data2 = User::where('nik', $nik)
            ->update([
                'nik' => $nik,
                'name' => $nama,
                'email' => $email,
                'jabatan' => $jabatan,
                'alamat' => $alamat,
                'photo' => $photo,
                'role' => $role,
                'notelepon' => $notelepon,
            ]);

        $data = KaryawanModel::all();
        return View('admin.HRD.karyawan.karyawan', compact(["data"]));
    }
    public function delete($id)
    {
        $data = KaryawanModel::find($id);
        $data->delete();
        $data2 = User::find($id);
        $data2->delete();
        $data = KaryawanModel::all();
        return View('admin.HRD.karyawan.karyawan', compact(["data"]));
    }
}
