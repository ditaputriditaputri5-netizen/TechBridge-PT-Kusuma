<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('promosi', function (Blueprint $table) {
            $table->integer('id_promosi')->primary();
            $table->integer('id_karyawan')->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->string('jabatan_lama')->nullable();
            $table->string('jabatan_baru')->nullable();
            $table->date('tanggal_promosi')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('promosi');
    }
};
