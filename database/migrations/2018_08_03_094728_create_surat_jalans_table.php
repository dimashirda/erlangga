<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_jalans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_transaksi');
            $table->date('tanggal_surat');
            $table->timestamps();
        });
        /*Schema::table('pembelians', function($table){
            $table->foreign('id_transaksi')
                ->references('id')
                ->on('transaksis')
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
        Schema::dropIfExists('surat_jalans');
    }
}
