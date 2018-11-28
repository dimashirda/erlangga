<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Supplier;
use App\Penjualan_detail;
//use Surat_jalan;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
    	$acc = Penjualan::orderBy('tanggal_transaksi','desc')->paginate(10);
    	return view('transaksi',['acc'=>$acc])->with('nav','transaksi');
    }
    public function tambah()
    {	
    	$pel = Pelanggan::all();
    	$bar = Barang::all();
    	return view('tambahtransaksi',['pel'=>$pel],['bar'=>$bar])->with('nav','transaksi');
    }
    public function simpan(Request $req)
    {   
        //dd($req);
        $penjualan = new Penjualan;
        $penjualan->pelanggan_id = $req->input('id_pelanggan');
        $penjualan->users_id = Auth::user()->id;
        $penjualan->tanggal_transaksi = Carbon::now("Asia/Bangkok");
        if(!empty($req->input('kredit')))
        {
            $penjualan->tanggal_jatuh_tempo = Carbon::parse($req->input('jatuh_tempo'));
            $penjualan->jenis_penjualan = 1;
            $this->kredit($req->input('id_pelanggan'),$req->input('harga_akhir'));
        }
        else
        {
            $penjualan->tanggal_jatuh_tempo = null;
            $penjualan->jenis_penjualan = 2;
        }
        $penjualan->total = $req->input('total_harga');
        $penjualan->diskon = $req->input('diskon_transaksi');
        $penjualan->potongan = $req->input('potongan_harga');
        $penjualan->total_akhir = $req->input('harga_akhir');
        $penjualan->kembalian = $req->input('uang_kembalian');
        $penjualan->save();

        //dd($penjualan);
        $this->inputdetail($req->input('id_barang'),$req->input('jumlah_barang'),$req->input('subtotal'),$penjualan->id);
        return redirect('/transaksi/detail/'.$penjualan->id.'');

    }
    public function inputdetail($barang,$jumlah,$subtotal,$penjualan)
    {
        $count = count($barang);

        for($i=0;$i<$count;$i++)
        {
            $detail = new Penjualan_detail;
            $detail->penjualan_id = $penjualan;
            $detail->barang_id = $barang[$i];
            $detail->jumlah = $jumlah[$i];
            $detail->total_satuan = $subtotal[$i];
            $detail->save();
        }
        return;
    }
    public function kredit($id,$total)
    {
        $pelanggan = Pelanggan::where('id',$id)->first();
        $pelanggan->kredit = $total;
        $pelanggan->save();
        return;
    }
    public function detail($id)
    {
        //dd($id);
        $penjualan = Penjualan::where('id',$id)->first();
        $detail = Penjualan_detail::where('penjualan_id',$id)->get();
        //dd($penjualan,$detail);
        return view('detailpenjualan',['penjualan'=>$penjualan,'detail'=>$detail]);
    }
    public function delete(Request $request)
    {   
        //dd($id);
        $penjualan = Penjualan::where('id',$request->id)->first();
        $detail = Penjualan_detail::where('penjualan_id',$request->id)->get();
        foreach ($detail as $item) 
        {
            $item->delete();
        }
        if($penjualan->delete())
        {
            $request->session()->flash('alert-success', 'Data transaksi berhasil dihapus.');
            return redirect ('/transaksi');
        }
        else{
            $request->session()->flash('alert-danger', 'Data transaksi gagal dihapus.');
            return redirect ('/transaksi');
        }  
    }
}
