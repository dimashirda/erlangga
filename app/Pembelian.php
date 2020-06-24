<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    use SoftDeletes;

    public function users()
    {
    	return $this->hasOne('App\Regis_user','id','users_id');
    }

    public function suplier()
    {
    	return $this->hasOne('App\Supplier','id','supplier_id');
    }
    
}
