<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\LiburModel;
use App\Models\JabatanModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class LiburController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search1')) {
            $data = LiburModel::where('tittle', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = LiburModel::where('deskripsi', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search2')) {
            $data = LiburModel::where('jabatan', 'LIKE', '%' . $request->search2 . '%')->get();
        } else {
            $data = LiburModel::all();
        }
        return View('admin/HRD/liburan/liburan', compact(["data"]));
    }
    public function create_Liburan()
    {
        $data = LiburModel::all();
        $data2 = JabatanModel::all();
        return View('admin/HRD/liburan/addliburan', compact(["data"], ["data2"]));
    }
    public function store(Request $request)
    {
        $will_insert = [];
        foreach ($request->input('jabatan') as $key => $value) {
            array_push($will_insert, ['jabatan' => $value]);
            $tittle = $request->input('tittle');
            $deskripsi = $request->input('deskripsi');
            $holiday_date = $request->input('holiday_date');

            $data = DB::table('liburan')
                ->insert([
                    'tittle' => $tittle,
                    'deskripsi' => $deskripsi,
                    'holiday_date' => $holiday_date,
                    'jabatan' => $value,
                ]);
        }
        $data = LiburModel::all();
        return View('admin.HRD.liburan.liburan', compact(["data"]));
    }
    public function edit($id)
    {
        $data = LiburModel::find($id);
        $create_liburan = [
            'id' => $id,
            'tittle' => $data->tittle,
            'deskripsi' => $data->deskripsi,
            'holiday_date' => $data->holiday_date,
            'jabatan' => $data->jabatan,
        ];

        return view('admin.HRD.liburan.editliburan', $create_liburan);
    }
    public function update($id, Request $request)
    {
        $tittle = $request->input('tittle');
        $deskripsi = $request->input('deskripsi');
        $holiday_date = $request->input('holiday_date');
        $jabatan = $request->input('jabatan');

        $data = LiburModel::find($id);

        $data = LiburModel::where('id', $id)
            ->update([
                'tittle' => $tittle,
                'deskripsi' => $deskripsi,
                'holiday_date' => $holiday_date,
                'jabatan' => $jabatan,
            ]);

        $data = LiburModel::all();
        return View('admin.HRD.liburan.liburan', compact(["data"]));
    }
    public function delete($id)
    {
        $data = LiburModel::find($id);
        $data->delete();
        $data = LiburModel::all();
        return View('admin.HRD.liburan.liburan', compact(["data"]));
    }
}
