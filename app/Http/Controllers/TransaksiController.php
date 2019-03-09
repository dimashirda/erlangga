<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Pelanggan;
use App\Barang;
use App\Supplier;
use App\Penjualan_detail;
use App\BarangDetail;
use App\LogBarang;
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
        $penjualan->uang_dibayar = $req->input('uang_tunai');
        $penjualan->save();

        //dd($penjualan);
        $this->inputdetail($req->input('id_barang'),$req->input('jumlah_barang'),$req->input('subtotal'),$penjualan->id,$req->input('harga_barang'));
        return redirect('/transaksi/detail/'.$penjualan->id.'');

    }
    public function inputdetail($barang,$jumlah,$subtotal,$penjualan,$harga_satuan)
    {
       
        foreach ($barang as $key => $value) {
            $detail = new Penjualan_detail;
            //dd($key,$value);
            $detail->penjualan_id = $penjualan;
            $detail->barang_id = $value;
            $detail->jumlah = $jumlah[$key];
            $detail->total_satuan = $subtotal[$key];
            $detail->harga_satuan = $harga_satuan[$key];
            //dd($detail);
            $detail->save();
            $this->logKeuntungan($detail,2);
            //$this->createLog($detail);
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
    public function edit($id)
    {
        $penjualan = Penjualan::find($id);
        $detail = Penjualan_detail::where('penjualan_id',$penjualan->id)->get();
        $pel = Pelanggan::all();
        $bar = Barang::all();
        return view('edittransaksi',['pel'=>$pel, 'bar'=>$bar, 'penjualan'=>$penjualan, 'detail'=>$detail])->with('nav','transaksi');
    }
    public function editsimpan(Request $request)
    {
        //dd($request);
        $penjualan = Penjualan::find($request->penjualan_id);
        $penjualan->pelanggan_id = $request->input('id_pelanggan');
        $penjualan->users_id = Auth::user()->id;
        $penjualan->tanggal_transaksi = Carbon::now("Asia/Bangkok");
        if(!empty($request->input('kredit')))
        {
            $penjualan->tanggal_jatuh_tempo = Carbon::parse($request->input('jatuh_tempo'));
            $penjualan->jenis_penjualan = 1;
            $this->kredit($request->input('id_pelanggan'),$request->input('harga_akhir'));
        }
        else
        {
            $penjualan->tanggal_jatuh_tempo = null;
            $penjualan->jenis_penjualan = 2;
        }
        $penjualan->total = $request->input('total_harga');
        $penjualan->diskon = $request->input('diskon_transaksi');
        $penjualan->potongan = $request->input('potongan_harga');
        $penjualan->total_akhir = $request->input('harga_akhir');
        $penjualan->kembalian = $request->input('uang_kembalian');
        $penjualan->uang_dibayar = $request->input('uang_tunai');
        $this->deletedetail($request->penjualan_id);
        $this->inputdetail($request->input('id_barang'),$request->input('jumlah_barang'),$request->input('subtotal'),$penjualan->id,$request->input('harga_barang'));
        if($penjualan->save())
        {
            $request->session()->flash('alert-success', 'Data transaksi berhasil diubah.');
            return redirect ('/transaksi/detail/'.$penjualan->id.'');
        }
        else{
            $request->session()->flash('alert-danger', 'Data transaksi gagal diubah.');
            return redirect ('/transaksi');
        }
        //dd($penjualan);
        
    }
    public function deletedetail($id)
    {
        $detail = Penjualan_detail::where('penjualan_id',$id)->get();
        foreach ($detail as $item) 
        {
            $item->delete();
        }
        return;
    }
    public function print($id)
    {
        $penjualan = Penjualan::where('id',$id)->first();
        $detail = Penjualan_detail::where('penjualan_id',$id)->get();
        //dd($penjualan,$detail);
        return view('printpenjualan',['penjualan'=>$penjualan,'detail'=>$detail]);   
    }
    public function logKeuntungan($data,$flag)
    {
        //dd($data);
        $query = BarangDetail::where('barang_id',$data->barang_id)
                            ->orderBy('harga_beli','asc')
                            ->get();
        //dd($query);
        $temp_jumlah_beli = $data->jumlah;
        foreach ($query as $item) 
        {   
            if($item->jumlah >= $temp_jumlah_beli)
            {
                $item->jumlah -= $temp_jumlah_beli;
                $item->save();
                app('App\Http\Controllers\LogController')->create($data,$flag,$item->id,$temp_jumlah_beli);
                break;    
            }
            elseif($item->jumlah < $temp_jumlah_beli)
            {
                $temp_jumlah_beli -= $item->jumlah;
                app('App\Http\Controllers\LogController')->create($data,$flag,$item->id,$item->jumlah);
                $item->jumlah = 0;
                $item->save();
            }
            
        }
        return;
    }
    public function pelunasan($id)
    {
        $data['penjualan'] = Penjualan::find($id);
        return view('pelunasan',$data)->with('nav','transaksi');
    }
    public function pelunasanBayar($id,Request $request)
    {
        //dd($id,$request);
        $query = Penjualan::find($id);
        $query->terbayar = $request->bayar;
        //$query->save();
        if($query->save())
        {
            $request->session()->flash('alert-success', 'Berhasil Terbayarkan');
            return redirect ('/pelanggan/detail/'.$query->pelanggan->id.'');
        }
        else{
            $request->session()->flash('alert-danger', 'Data transaksi gagal diubah.');
            return redirect ('/transaksi');
        }
    }
}
