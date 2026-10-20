<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->integer('id_karyawan')->primary();
            $table->integer('id_pelamar')->nullable();
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->date('tanggal_masuk')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
