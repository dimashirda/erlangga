<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';

    public function users()
    {
    	return $this->hasOne('App\Regis_user','id','user_id');
    }
}
