<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_penjualan');
            $table->unsignedInteger('id_surat');
            $table->datetime('waktu_transaksi');
            $table->integer('jumlah');
            $table->binary('cara_pembayaran');
            $table->date('jatuh_tempo'); 
            $table->timestamps();
        });
        /*Schema::table('pembelians', function($table){
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_pelanggan')
                ->references('id')
                ->on('pelanggans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_penjualan')
                ->references('id')
                ->on('penjualan_barangs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_surat')
                ->references('id')
                ->on('surat_jalans')
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
        Schema::dropIfExists('transaksis');
    }
}
