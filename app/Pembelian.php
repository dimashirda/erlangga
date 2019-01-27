<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';

    public function users()
    {
    	return $this->hasOne('App\Regis_user','id','users_id');
    }

    public function suplier()
    {
    	return $this->hasOne('App\Supplier','id','supplier_id');
    }
    
}
