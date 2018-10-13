<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat_jalan extends Model
{
    protected $table = 'surat_jalans';

    public function transaksi()
    {
    	return $this->hasMany('App\Transaksi','id_surat','id');
    }
}
