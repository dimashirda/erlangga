<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    public function pelanggan_beli()
    {
    	return $this->hasMany('App\Transaksi','id_pelanggan','id');
    }
}
