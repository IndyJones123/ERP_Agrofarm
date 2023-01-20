<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\JabatanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class JabatanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search1')) {
            $data = JabatanModel::where('namajabatan', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = JabatanModel::where('minimalgaji', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search3')) {
            $data = JabatanModel::where('maksimalgaji', 'LIKE', '%' . $request->search3 . '%')->get();
        } else {
            $data = JabatanModel::all();
        }
        return View('admin/HRD/jabatan/jabatan', compact(["data"]));
    }
    public function create_jabatan()
    {
        $data = JabatanModel::all();
        return View('admin/HRD/jabatan/addjabatan', compact(["data"]));
    }
    public function store(Request $request)
    {
        $namajabatan = $request->input('namajabatan');
        $minimalgaji = $request->input('minimalgaji');
        $maksimalgaji = $request->input('maksimalgaji');

        $data = DB::table('jabatan')
            ->insert([
                'namajabatan' => $namajabatan,
                'minimalgaji' => $minimalgaji,
                'maksimalgaji' => $maksimalgaji,
            ]);
        $data = JabatanModel::all();
        return View('admin.HRD.jabatan.jabatan', compact(["data"]));
    }
    public function edit($id)
    {
        $data = JabatanModel::find($id);
        $create_jabatan = [
            'id' => $id,
            'namajabatan' => $data->namajabatan,
            'minimalgaji' => $data->minimalgaji,
            'maksimalgaji' => $data->maksimalgaji,
        ];
        return view('admin.HRD.jabatan.editjabatan', $create_jabatan);
    }
    public function update($id, Request $request)
    {
        $namajabatan = $request->input('namajabatan');
        $minimalgaji = $request->input('minimalgaji');
        $maksimalgaji = $request->input('maksimalgaji');

        $data = JabatanModel::find($id);

        $data = JabatanModel::where('id', $id)
            ->update([
                'namajabatan' => $namajabatan,
                'minimalgaji' => $minimalgaji,
                'maksimalgaji' => $maksimalgaji,
            ]);
        $data = JabatanModel::all();
        return View('admin.HRD.jabatan.jabatan', compact(["data"]));
    }
    public function delete($id)
    {
        $data = JabatanModel::find($id);
        $data->delete();
        $data = JabatanModel::all();
        return View('admin.HRD.jabatan.jabatan', compact(["data"]));
    }
}
