<?php

namespace App\Console\Commands;

use App\Models\KaryawanModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class update_logkehadiran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Status Dari Belum Absen Menjadi Tidak Masuk Apabila Tidak Mengisi';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = KaryawanModel::all();
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        foreach ($data as $karyawan) {
            DB::table('logkehadiran')->where('status', 'LIKE', 'BelumAbsen')
                ->update(['status' => 'TidakMasuk']);
        }
    }
}
