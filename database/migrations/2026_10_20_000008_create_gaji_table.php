<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->integer('id_gaji')->primary();
            $table->integer('id_karyawan')->nullable();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
            $table->decimal('nominal', 8, 2)->nullable();
            $table->string('periode', 255)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('gaji');
    }
};
