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
        Schema::create('permohonan_dinasluar', function (Blueprint $table) {
            $table->id();
            $table->string('namakaryawan');
            $table->string('jabatan');
            $table->date('tanggal');
            $table->string('alamattujuan');
            $table->string('tugas');
            $table->string('atasan');
            $table->string('jabatanatasan');
            $table->date('tanggalberangkat');
            $table->date('tanggalpulang');
            $table->string('foto', 300);
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
        Schema::dropIfExists('permohonan_dinasluars');
    }
};
