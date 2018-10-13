<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    public function supplier_pembelian()
    {
    	return $this->hasMany('App\Pembelian','id_supplier','id');
    }
}
