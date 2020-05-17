<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penjualan;
use Carbon\Carbon;
use App\Exports\InvoiceLaporanPenjualan;

class ReadController extends Controller
{
    public function laporanPenjualan(Request $request)
    {	
    	$tanggal1 = Carbon::createFromFormat('m/d/Y', $request->tanggal1)->startOfDay();
    	$tanggal2 = Carbon::createFromFormat('m/d/Y', $request->tanggal2)->endOfDay();
    	// dd($tanggal1,$tanggal2);
    	$result = Penjualan::whereBetween('tanggal_transaksi',[$tanggal1, $tanggal2])->with(['detail','pelanggan','kasir','giro','transfer','detail.barang'])->get();
    	$data['result'] = $result;
    	$data['tanggal1'] = $tanggal1;
    	$data['tanggal2'] = $tanggal2;
    	return (new InvoiceLaporanPenjualan($data))->download('Laporan_Penjualan.xlsx');
    }
}
