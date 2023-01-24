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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nik')->default('0');
            $table->string('alamat')->default('null');
            $table->string('jabatan')->default('null');
            $table->integer('notelepon')->default('0');
            $table->string('photo', 300)->default('null');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->default('0');
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
        Schema::dropIfExists('karyawan');
    }
};
