<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('seleksi', function (Blueprint $table) {
            $table->integer('id_seleksi')->primary();
            $table->integer('id_lamaran')->nullable();
            $table->foreign('id_lamaran')->references('id_lamaran')->on('lamaran');
            $table->date('tanggal_seleksi')->nullable();
            $table->string('hasil')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('seleksi');
    }
};
