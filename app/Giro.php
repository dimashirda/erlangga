<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Giro extends Model
{
    protected $table = 'giro';
    use SoftDeletes;
    public function penjualan()
    {
        return $this->hasOne('App\Penjualan','id','penjualan_id');
    }

    public function getTanggalAttribute()
    {
        $date = Carbon::parse($this->tanggal_cair)->format('d M Y');
        return $date;
    }
}
