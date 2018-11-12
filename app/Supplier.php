<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    public function supplier_pembelian()
    {
    	return $this->hasMany('App\Pembelian','supplier_id','id');
    }
}
