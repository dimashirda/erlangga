<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LogTransaksi extends Model
{
    protected $table = 'log_transaksi';
    public $incrementing = false;
    use SoftDeletes;
    public function barangDetail()
    {
        return $this->hasOne('App\BarangDetail','id','barang_detail_id');
    }

    public function penjualan()
    {
    	return $this->hasOne('App\Penjualan','id','penjualan_id');
    }

    public function pembelian()
    {
    	return $this->hasOne('App\Pembelian','id','pembelian_id');
    }
    public function keuntungan()
    {
        
    }
}
