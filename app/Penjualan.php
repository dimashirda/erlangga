<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
}
