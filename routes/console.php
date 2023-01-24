<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Route::get('/tableAbsensi', [AbsensiController::class, 'index']);
Route::get('/tableAbsensi/create', [AbsensiController::class, 'create_Absensi']);
Route::post('/tableAbsensi/create/store', [AbsensiController::class, 'store']);
Route::get('/tableAbsensi/{id}/edit', [AbsensiController::class, 'edit']);
Route::put('/tableAbsensi/{id}', [AbsensiController::class, 'update']);
Route::delete('/tableAbsensi/{id}', [AbsensiController::class, 'delete']);
