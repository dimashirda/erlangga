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
        // dd($request);
    	$tanggal1 = Carbon::createFromFormat('m/d/Y', $request->tanggaldownload1)->startOfDay();
    	$tanggal2 = Carbon::createFromFormat('m/d/Y', $request->tanggaldownload2)->endOfDay();
    	// dd($tanggal1,$tanggal2);
    	$result = Penjualan::whereBetween('tanggal_transaksi',[$tanggal1, $tanggal2])->with(['detail','pelanggan','kasir','giro','transfer','detail.barang'])->get();
    	$data['result'] = $result;
    	$data['tanggal1'] = $tanggal1;
    	$data['tanggal2'] = $tanggal2;
    	return (new InvoiceLaporanPenjualan($data))->download('Laporan_Penjualan.xlsx');
    }

    public function download (Request $request)
    {
        if(empty($request->tanggaldownload1))
        {
            $start = Carbon::now("Asia/Bangkok")->startOfDay();
        }
        else
        {
            $start = Carbon::createFromFormat('m/d/Y', $request->tanggaldownload1)->startOfDay();
        }
        if(empty($request->tanggaldownload2))
        {
            $end = Carbon::now("Asia/Bangkok")->endOfDay();
        }
        else
        {
            $end = Carbon::createFromFormat('m/d/Y', $request->tanggaldownload2)->endOfDay();
        }
        $data['penjualan'] = Penjualan::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $data['pembelian'] = Pembelian::whereBetween("tanggal_transaksi",[$start,$end])->get();
        $log_jual = LogTransaksi::where('tipe',2)
                                ->whereHas('penjualan',function($q) use ($start,$end) {
                                    $q->whereBetween('tanggal_transaksi',[$start,$end]);
                                })->get();
        $data['untung'] = 0;
        // dd($log_jual);
        foreach ($log_jual as $jual) 
        {   
            $barang_id = $jual->barangDetail->barang_id;
            $detail = BarangDetail::where('barang_id',$barang_id)->orderBy('created_at','DESC')->first();
            // dd($detail);
            $harga_beli = $detail->harga_beli;
            // $harga_beli = $jual->barangDetail->harga_beli;
            $data['untung'] += ($jual->harga_satuan - $harga_beli) * $jual->jumlah;
            // if($jual->harga_satuan - $harga_beli < 0)
            // {
            //     dd($data['untung'],$harga_beli,$jual,$barang_id);
            // }
        }
        $data['acc'] = Penjualan::whereBetween('tanggal_transaksi',[$start,$end])->with('pelanggan','kasir')->paginate(10);
        // dd($data['untung']);
        $data['penjualan'] = Penjualan::whereBetween('tanggal_transaksi',[$start, $end])->get()->sum('total_akhir');
        $data['start'] = $start->format('d M Y');
        $data['end'] = $end->format('d M Y');
        return Excel::download(new MttRegistrationsExport($data), 'MttRegistrations.xlsx');
    }
}
