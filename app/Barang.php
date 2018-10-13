<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    public $incrementing = false;

    public function barang_jual()
    {
    	return $this->belongsToMany('App\Transaksi','Penjualan_barang','id_transaksi','id_barang');
    }
    public function barang_beli()
    {
    	return $this->belongsToMany('App\Pembelian','Pembelian_barang','id_penjualan','id_barang');
    }
}
