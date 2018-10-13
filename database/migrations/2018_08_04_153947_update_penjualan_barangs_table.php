<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePenjualanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penjualan_barangs', function($table){
            $table->foreign('id_barang')
                ->references('id')
                ->on('barangs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_transaksi')
                ->references('id')
                ->on('transaksis')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
