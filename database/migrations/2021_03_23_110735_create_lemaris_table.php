<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lemaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_lemari');
            $table->string('nama_lemari');
            $table->string('jenis');
            $table->string('keterangan');
            $table->string('kapasitas');
            $table->string('jumlah');
            $table->integer('ruangans_id');
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
        Schema::dropIfExists('lemaris');
    }
}
