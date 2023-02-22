<?php

namespace App\Exports;

use App\Models\KehadiranLogModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataLogModel implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return KehadiranLogModel::select('namakaryawan', 'jabatan', 'tanggal', 'absenmasuk', 'absenkeluar', 'status', 'keterangan')->get();
    }
    public function headings(): array
    {
        return ["NAMAPEGAWAI", 'JABATAN', 'TANGGAL', 'ABSENMASUK', 'ABSENKELUAR', 'STATUS', 'KETERANGAN'];
    }
}
