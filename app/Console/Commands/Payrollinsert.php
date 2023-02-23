<?php

namespace App\Console\Commands;

use App\Models\PayrollModel;
use App\Models\KehadiranModel;
use App\Models\JabatanModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Payrollinsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payroll:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Untuk Melakukan Insert Payroll Data payroll Setiap Akhir Bulan';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bulan = Carbon::now()->month;

        $data = KehadiranModel::all()->where('bulan', $bulan);

        $tanggal = Carbon::now()->toDateString();

        foreach ($data as $payroll) {
            $gajipokok = DB::table('jabatan')->select('gajipokok')->where('namajabatan', $payroll->jabatan)->value('$test');
            $gajiharian = DB::table('jabatan')->select('gajiharian')->where('namajabatan', $payroll->jabatan)->value('$test');
            DB::table('payrollkaryawan')
                ->insert([
                    'nama' => $payroll->namapegawai, 'nik' => $payroll->nik, 'jabatan' => $payroll->jabatan, 'tanggal' => $tanggal, 'gajipokok' =>
                    $gajipokok, 'gajiharian' => $gajiharian * ($payroll->hadir + $payroll->dinasluar)
                ]);
        }
    }
}
