<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->integer('id_evaluasi')->primary();
            $table->integer('id_karyawan')->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->date('tanggal_evaluasi')->nullable();
            $table->text('hasil')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluasi');
    }
};
