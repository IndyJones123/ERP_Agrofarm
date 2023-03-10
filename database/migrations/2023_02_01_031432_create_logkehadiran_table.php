<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logkehadiran', function (Blueprint $table) {
            $table->id();
            $table->string('namakaryawan');
            $table->string('jabatan');
            $table->date('tanggal');
            $table->time('absenmasuk');
            $table->time('absenkeluar');
            $table->string('status');
            $table->string('keterangan', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_log_kehadiran');
    }
};
