<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\BarangDetail;
use App\Jenis;

class Barang extends Model
{
    protected $table = 'barang';
    use SoftDeletes;
    public function barang_jual()
    {
    	return $this->hasMany('App\Pembelian','barang_id','id');
    }
    public function barang_beli()
    {
    	return $this->hasMany('App\Penjualan','penjualan_id','id');
    }
    public function barang_detail()
    {   
        return $this->hasMany('App\BarangDetail','barang_id','id')->where('jumlah','>','0');
    }
    public function getStokAttribute()
    {
        return $this->hasMany('App\BarangDetail','barang_id','id')->sum('jumlah');
    }
    public function getHargaBeliAttribute()
    {   
        // dd($this->hasMany('App\BarangDetail','barang_id','id')->where('jumlah','>','0')->orderBy('harga_beli','ASC')->first());
        return $this->hasMany('App\BarangDetail','barang_id','id')->where('jumlah','>','0')->orderBy('harga_beli','ASC')->first();
    }
    public function jenis_barang()
    {
        return $this->hasOne('App\Jenis','id','jenis');
    }
}
