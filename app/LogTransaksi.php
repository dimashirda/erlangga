<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogTransaksi extends Model
{
    protected $table = 'log_transaksi';
    public $incrementing = false;

    public function barangDetail()
    {
        return $this->hasOne('App\BarangDetail','id','barang_detail_id');
    }

    public function keuntungan()
    {

    }
}
