<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\LogTransaksi;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    use SoftDeletes;

    public function pelanggan()
    {
    	return $this->hasOne('App\Pelanggan','id','pelanggan_id');
    }

    public function kasir()
    {
    	return $this->hasOne('App\Regis_user','id','users_id');
    }

    public function giro()
    {
        return $this->hasOne('App\Giro','penjualan_id','id');
    }

    public function transfer()
    {
        return $this->hasOne('App\Transfer','penjualan_id','id');
    }

    public function detail()
    {
        return $this->hasMany('App\Penjualan_detail','penjualan_id','id');
    }

    public function getUntungAttribute()
    {
        $log_jual = LogTransaksi::where('penjualan_id',$this->id)->get();
        $untung = 0;
        foreach ($log_jual as $jual) 
        {   
            $barang_id = $jual->barangDetail->barang_id;
            $detail = BarangDetail::where('barang_id',$barang_id)->orderBy('created_at','DESC')->first();
            // dd($detail);
            $harga_beli = $detail->harga_beli;
            // $harga_beli = $jual->barangDetail->harga_beli;
            $untung += ($jual->harga_satuan - $harga_beli) * $jual->jumlah;
        }
        return $untung;
    }
}
