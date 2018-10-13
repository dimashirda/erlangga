<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Regis_user extends Authenticatable
{
    protected $table = 'users';
    
    public function user_penjualan()
    {
    	return $this->hasMany('App\Transaksi','id_user','id');
    }
}
