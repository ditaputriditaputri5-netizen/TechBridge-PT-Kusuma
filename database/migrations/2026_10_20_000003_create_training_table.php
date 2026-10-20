<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->integer('id_training')->primary();
            $table->integer('id_pelamar')->nullable();
            $table->foreign('id_pelamar')->references('id_pelamar')->on('pelamar');
            $table->date('tanggal_training')->nullable();
            $table->string('hasil')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('training');
    }
};
