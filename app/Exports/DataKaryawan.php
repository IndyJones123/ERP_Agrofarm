<?php

namespace App\Exports;

use App\Models\KaryawanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataKaryawan implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return KaryawanModel::select('nama', 'nik', 'alamat', 'jabatan', 'notelepon', 'photo', 'email')->get();
    }
    public function headings(): array
    {
        return ["NAMAPEGAWAI", 'NIK', 'ALAMAT', 'JABATAN', 'NOTELEPON', 'PHOTO', 'EMAIL'];
    }
}
