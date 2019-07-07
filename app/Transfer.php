<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Transfer extends Model
{
    protected $table = 'transfer';
    use SoftDeletes;
    public function penjualan()
    {
        return $this->hasOne('App\Penjualan','id','penjualan_id');
    }
}
