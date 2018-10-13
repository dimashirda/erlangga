<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function($table){
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
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
