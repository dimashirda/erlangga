<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogBarang extends Model
{
    protected $table = 'log_barang';
    use SoftDeletes;

    public function detail_beli()
    {
    	return $this->hasOne('App\Pembelian_detail','id','pembelian_detail_id');
    }
}
