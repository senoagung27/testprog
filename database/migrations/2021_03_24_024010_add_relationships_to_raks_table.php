<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToRaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raks', function (Blueprint $table) {
            $table->integer('lemaris_id')->unsigned()->change();
            $table->foreign('lemaris_id')->references('id')->on('lemaris')
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
        Schema::table('raks', function (Blueprint $table) {
            $table->dropForeign('raks_lemari_id_foreign');
        });

        Schema::table('raks', function (Blueprint $table) {
            $table->dropIndex('raks_lemaris_id_foreign');
        });
        Schema::table('raks', function (Blueprint $table) {
            $table->integer('lemaris_id')->change();
        });
    }
}
