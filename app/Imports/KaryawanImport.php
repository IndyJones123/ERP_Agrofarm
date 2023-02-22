<?php

namespace App\Imports;

use App\Models\KaryawanModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function model(array $row)
    {
        $data = array(
            'a' => new KaryawanModel([
                'nama' => $row['nama'],
                'nik' => $row['nik'],
                'alamat' => $row['alamat'],
                'jabatan' => $row['jabatan'],
                'notelepon' => $row['notelepon'],
                'photo' => $row['photo'],
                'email' => $row['email'],
                'password' => hash::make($row['password']),
                'role' => $row['role'],
                'issatpam' => $row['issatpam'],
            ]),
            'b' => new User([
                'name' => $row['nama'],
                'nik' => $row['nik'],
                'alamat' => $row['alamat'],
                'jabatan' => $row['jabatan'],
                'notelepon' => $row['notelepon'],
                'photo' => $row['photo'],
                'email' => $row['email'],
                'password' => hash::make($row['password']),
                'role' => $row['role'],
            ]),
        );
        return $data;
    }
}
