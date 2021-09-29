<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('berkas_id')->unsigned()->change();
            $table->foreign('berkas_id')->references('id')->on('berkas')
            ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('petugas_id')->unsigned()->change();
            $table->foreign('petugas_id')->references('id')->on('petugas')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('penyewas_id')->unsigned()->change();
            $table->foreign('penyewas_id')->references('id')->on('penyewas')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Berkas
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_berkas_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksis_berkas_id_foreign');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('berkas_id')->change();
        });

        //Petugas
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_petugas_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksis_petugas_id_foreign');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('petugas_id')->change();
        });

        //Penyewa
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign('transaksis_penyewas_id_foreign');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropIndex('transaksis_penyewas_id_foreign');
        });
        Schema::table('transaksis', function (Blueprint $table) {
            $table->integer('penyewas_id')->change();
        });
    }
}
