<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan_detail extends Model
{
    protected $table = 'Penjualan_detail';

    public function barang()
    {
    	return $this->hasOne('App\Barang','id','barang_id');
    }
}
