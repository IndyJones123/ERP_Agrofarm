<?php

namespace App\Exports;

use App\Models\KehadiranModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataKehadiran implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KehadiranModel::all();
    }
}
