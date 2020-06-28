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
    public function index()
    {
    	$start = Carbon::now("Asia/Bangkok")->startOfDay();
        $end = Carbon::now("Asia/Bangkok")->endOfDay();
        $data['penjualan'] = Penjualan::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $data['pembelian'] = Pembelian::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $log_jual = LogTransaksi::where('tipe',2)
                                ->whereBetween('created_at',[$start,$end])->get();
        $data['untung'] = 0;
        foreach ($log_jual as $jual) 
        {   
            $harga_beli = $jual->barangDetail->harga_beli;
            $data['untung'] += ($jual->harga_satuan - $harga_beli) * $jual->jumlah;
        }
        $data['penjualan'] = Penjualan::whereBetween('tanggal_transaksi',[$start, $end])->get()->sum('total_akhir');
        return view('laporan.home',$data);
    }
}
