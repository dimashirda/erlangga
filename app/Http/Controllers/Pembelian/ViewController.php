<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Pembelian_detail;

class ViewController extends Controller
{
    public function index()
    {	
        $acc = Pembelian::all();
        // dd($acc);
    	return view('pembelian.index',['acc'=>$acc])->with('nav','pembelian');
    }

    public function tambah()
    {
    	return view('pembelian.tambah')->with('nav','pembelian');
    }

    public function detail($id)
    {
    	$pembelian = Pembelian::where('id',$id)->first();
        $detail = Pembelian_detail::where('pembelian_id',$id)->get();
        //dd($penjualan,$detail);
        return view('pembelian.detail',['pembelian'=>$pembelian,'detail'=>$detail]);
    }
}
