<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->integer('id_lowongan')->primary();
            $table->string('posisi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('persyaratan')->nullable();
            $table->date('tanggal_buka')->nullable();
            $table->string('status')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('lowongan');
    }
};
