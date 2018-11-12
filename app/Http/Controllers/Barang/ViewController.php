<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;

class ViewController extends Controller
{
    public function index()
    {	
        $acc = Barang::paginate(25);
    	return view('barang',['acc'=>$acc])->with('nav','barang');
    }

    public function tambah()
    {
    	return view('tambahbarang')->with('nav','barang');
    }
}
