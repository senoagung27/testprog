<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryBarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_barus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis');
            $table->string('nomor');
            $table->string('kecamatan');
            $table->string('kelurahan_desa');
            $table->string('status');
            $table->string('rak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_barus');
    }
}
