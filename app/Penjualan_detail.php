<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan_detail extends Model
{
    protected $table = 'Penjualan_detail';
    use SoftDeletes;

    public function barang()
    {
    	return $this->hasOne('App\Barang','id','barang_id');
    }
}
