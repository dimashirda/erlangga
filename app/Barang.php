<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    protected $table = 'barang';

    public $incrementing = false;

    public function barang_jual()
    {
    	return $this->hasMany('App\Pembelian','barang_id','id');
    }
    public function barang_beli()
    {
    	return $this->hasMany('App\Penjualan','penjualan_id','id');
    }
}
