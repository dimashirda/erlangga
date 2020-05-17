<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan_detail extends Model
{
    protected $table = 'penjualan_detail';
    use SoftDeletes;

    public function barang()
    {
    	return $this->hasOne('App\Barang','id','barang_id');
    }

    public function penjualan()
    {
    	return $this->hasOne('App\Penjualan','id','penjualan_id');
    }
}
