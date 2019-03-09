<?php

namespace App\Http\Controllers\Pemotongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;

class ViewController extends Controller
{
    public function potongStok()
    {
    	$data['barang'] = Barang::all();
    	return view('pemotongan.tambahstok',$data);
    }
}
