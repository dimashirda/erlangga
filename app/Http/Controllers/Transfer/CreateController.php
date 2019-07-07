<?php

namespace App\Http\Controllers\Transfer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transfer;
class CreateController extends Controller
{
    public function create($penjualan_id)
    {
    	$transfer = new Transfer;
    	$transfer->penjualan_id = $penjualan_id;
    	$transfer->save();
    	return $transfer;
    }
}
