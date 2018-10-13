<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    public function pelanggans()
    {
    	return $this->belongsTo('App\Pelanggan','id_pelanggan','id');
    }

    public function users()
    {
    	return $this->belongsTo('App\Regis_user','id_user','id');
    }

    public function barangs()
    {
    	return $this->belongsToMany('App\Barang','id_barang','id');
    }

    public function surats()
    {
    	return $this->belongsTo('App\Surat_jalan','id_surat','id');
    }
}
