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
            $table->string('nama')->unique();
            $table->integer('nik')->default('123456');
            $table->string('alamat')->default('null');
            $table->string('jabatan')->default('null');
            $table->string('notelepon')->default('0');
            $table->string('photo', 300)->default('null');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->default('2');
            $table->integer('issatpam')->default('0');
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
