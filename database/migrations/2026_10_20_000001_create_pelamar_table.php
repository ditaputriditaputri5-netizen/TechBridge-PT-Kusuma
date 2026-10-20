<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {

    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->integer('id_pelamar')->primary();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('cv')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pelamar');
    }
};
