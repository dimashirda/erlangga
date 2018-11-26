<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    public function pelanggan()
    {
    	return $this->hasOne('App\Pelanggan','id','pelanggan_id');
    }

    public function kasir()
    {
    	return $this->hasOne('App\Regis_user','id','user_id');
    }
}
