<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->integer('id_cuti')->primary();
            $table->integer('id_karyawan')->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->string('jenis_cuti')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('alasan')->nullable();
            $table->text('status')->nullable();
            $table->integer('id_manager')->nullable();
            $table->date('tanggal_keputusan')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('cuti');
    }
};
