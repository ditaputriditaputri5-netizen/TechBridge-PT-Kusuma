<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->integer('id_lamaran')->primary();
            $table->integer('id_pelamar')->nullable();
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            $table->integer('id_lowongan')->nullable();
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan');
            $table->date('tanggal_lamaran')->nullable();
            $table->string('status')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('lamaran');
    }
};
