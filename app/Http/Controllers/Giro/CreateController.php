<?php

namespace App\Http\Controllers\Giro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Giro;
use Carbon\Carbon;
class CreateController extends Controller
{
    public function create($penjualan_id,$no_seri,$tanggal_cair,$nominal)
    {
    	$giro = new Giro;
    	$giro->penjualan_id = $penjualan_id;
    	$giro->no_seri = $no_seri;
    	$giro->tanggal_cair = Carbon::parse($tanggal_cair);
    	$giro->nominal = $nominal;
    	$giro->konfirmasi = 0;
    	$giro->save();

    	return $giro;
    }
}
