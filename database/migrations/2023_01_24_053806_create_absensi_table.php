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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('tempat');
            $table->string('jabatan');
            $table->time('start_time');
            $table->string('hari');
            $table->string('longtitude');
            $table->string('latitude');
            $table->integer('jarak');
            $table->time('batas_start_time');
            $table->time('end_time');
            $table->time('batas_end_time');
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
        Schema::dropIfExists('absensi');
    }
};
