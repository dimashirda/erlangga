<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    public function transaksi()
    {
    	return $this->hasMany('App\Penjualan','id','pelanggan_id');
    }
}
