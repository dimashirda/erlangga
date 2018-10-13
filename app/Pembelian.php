<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelians';

    public function users()
    {
    	return $this->belongsTo('App\Regis_user','id_user','id');
    }
    public function barangs()
    {
    	return $this->belongsToMany('App\Barang','id_barang','id');
    }
    public function suppliers()
    {
    	return $this->belongsToMany('App\Supplier','id_supplier','id');
    }
}
