<?php

namespace App\Exports;

use App\Models\KehadiranLogModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataLogModel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KehadiranLogModel::all();
    }
}
