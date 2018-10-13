<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pb');
            $table->integer('total_harga');
            $table->timestamps();
        });
        /*Schema::table('pembelians', function($table){
            $table->foreign('id_pb')
                ->references('id')
                ->on('pembelian_barangs')
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
        Schema::dropIfExists('pembelians');
    }
}
