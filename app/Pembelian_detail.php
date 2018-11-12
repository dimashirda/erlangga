<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian_detail extends Model
{
    protected $table = 'pembelian_detail';

    public function barang()
    {
    	return $this->hasOne('App\Barang','id','barang_id');
    }
}
