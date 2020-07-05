<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penjualan;
use App\Pembelian;
use Carbon\Carbon;
use App\LogTransaksi;

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
        $data['penjualan'] = Penjualan::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $data['pembelian'] = Pembelian::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $log_jual = LogTransaksi::where('tipe',2)
                                ->whereBetween('created_at',[$start,$end])->get();
        $data['untung'] = 0;
        // dd($log_jual);
        foreach ($log_jual as $jual) 
        {   
            $harga_beli = $jual->barangDetail->harga_beli;
            $data['untung'] += ($jual->harga_satuan - $harga_beli) * $jual->jumlah;
        }
        $data['acc'] = Penjualan::whereBetween('tanggal_transaksi',[$start,$end])->with('pelanggan','kasir')->paginate(10);
        // dd($data['untung']);
        $data['penjualan'] = Penjualan::whereBetween('tanggal_transaksi',[$start, $end])->get()->sum('total_akhir');
        $data['start'] = $start->format('d M Y');
        $data['end'] = $end->format('d M Y');
        return view('laporan.home',$data);
    }
}
