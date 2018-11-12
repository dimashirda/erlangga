<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Regis_user extends Authenticatable
{
    protected $table = 'users';
    
    public function user_penjualan()
    {
    	return $this->hasMany('App\Penjualan','id_user','id');
    }
    public function user_pembelian()
    {
    	return $this->hasMany('App\Penjualan','id_user','id');
    }

}
