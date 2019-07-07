<?php

namespace App\Http\Controllers\Pemotongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;

class ViewController extends Controller
{
    public function potongStok()
    {
    	$barang = Barang::all();
    	foreach ($barang as $key => $value) {
    		$jumlah_barang = 0;
    		$harga = 0;
            foreach ($value->barang_detail as $detail) {
                $jumlah_barang += $detail->jumlah;
                if($harga < $detail->harga_beli)
                	$harga = $detail->harga_beli;
            }
            $value->setAttribute('jumlah',$jumlah_barang);
            $value->setAttribute('harga_beli',$harga);
    	}
    	$data['barang'] = $barang;
    	return view('pemotongan.tambahstok',$data);
    }
}
