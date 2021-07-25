<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangDetail extends Model
{
    protected $table = 'barang_detail';
    use SoftDeletes;

    public function barang()
    {
        return $this->hasOne('App\Barang','id','barang_id');
    }
    public function log()
    {
    	return $this->hasOne('App\LogBarang','barang_detail_id','id');
    }
}
