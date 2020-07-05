<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Pembelian_detail;
use Carbon\Carbon;
class ViewController extends Controller
{
    public function index(Request $request)
    {	
        if(empty($request->tanggal1))
        {
            $start = Carbon::now("Asia/Bangkok")->startOfDay();
        }
        else
        {
            $start = Carbon::createFromFormat('m/d/Y', $request->tanggal1)->startOfDay();
        }
        if(empty($request->tanggal2))
        {
            $end = Carbon::now("Asia/Bangkok")->endOfDay();
        }
        else
        {
            $end = Carbon::createFromFormat('m/d/Y', $request->tanggal2)->endOfDay();
        }
        $acc = Pembelian::whereBetween('tanggal_transaksi',[$start,$end])->orderBy('tanggal_transaksi','desc')->paginate(10);
        // dd($acc);
    	return view('pembelian.index',['acc'=>$acc,'start'=>$request->tanggal1,'end'=>$request->tanggal2])->with('nav','pembelian');
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
