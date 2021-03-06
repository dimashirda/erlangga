z<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_barang',10);
            $table->unsignedInteger('id_beli');
            $table->timestamps();
        });
        /*Schema::table('pembelians', function($table){
            $table->foreign('id_barang')
                ->references('id')
                ->on('barangs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_beli')
                ->references('id')
                ->on('pembelians')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian_barangs');
    }
}
