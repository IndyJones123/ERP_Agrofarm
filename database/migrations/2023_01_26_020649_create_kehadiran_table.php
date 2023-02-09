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
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai');
            $table->date('bulan');
            $table->string('nik');
            $table->string('jabatan');
            $table->integer('sakit');
            $table->integer('izin');
            $table->integer('alpha');
            $table->integer('cuti');
            $table->integer('dinasluar');
            $table->integer('terlambat');
            $table->integer('hadir');
            $table->integer('wajibhadir');
            $table->integer('sisacuti');
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
        Schema::dropIfExists('kehadiran');
    }
};
