<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('minute:insert')->dailyAt('00:00')->timezone('Asia/Jakarta');
        // $schedule->command('minute:update')->dailyAt('23:00')->timezone('Asia/Jakarta');
        // $schedule->command('kehadiran:insert')->monthly()->timezone('Asia/Jakarta');
        // $schedule->command('kehadiran:update')->everyFourHours()->timezone('Asia/Jakarta');
        // $schedule->command('payroll:insert')->lastDayOfMonth('00:00')->timezone('Asia/Jakarta');

        $schedule->command('minute:insert')->dailyAt('09:51')->timezone('Asia/Jakarta');
        $schedule->command('minute:update')->dailyAt('23:25')->timezone('Asia/Jakarta');
        $schedule->command('kehadiran:insert')->dailyAt('23:24')->timezone('Asia/Jakarta');
        $schedule->command('kehadiran:update')->dailyAt('23:25')->timezone('Asia/Jakarta');
        $schedule->command('payroll:insert')->dailyAt('09:12')->timezone('Asia/Jakarta');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
