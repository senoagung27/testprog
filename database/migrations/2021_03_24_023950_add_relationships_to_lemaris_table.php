<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToLemarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lemaris', function (Blueprint $table) {
            $table->integer('ruangans_id')->unsigned()->change();
            $table->foreign('ruangans_id')->references('id')->on('ruangans')
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
        Schema::table('lemaris', function (Blueprint $table) {
            $table->dropForeign('lemaris_ruangans_id_foreign');
        });

        Schema::table('lemaris', function (Blueprint $table) {
            $table->dropIndex('lemaris_ruangans_id_foreign');
        });
        Schema::table('lemaris', function (Blueprint $table) {
            $table->integer('ruangans_id')->change();
        });
    }
}
