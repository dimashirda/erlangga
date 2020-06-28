<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Pembelian_detail;
use Auth;
use Carbon\Carbon;

class CreateController extends Controller
{
    public function create($data)
    {   
        $pembelian = new Pembelian;
        $pembelian->supplier_id = $data['id_supplier'];
        $pembelian->users_id = Auth::user()->id;
        // dd($data);
        if(is_null($data['tanggal_transaksi']))
        {
            $pembelian->tanggal_transaksi = Carbon::now("Asia/Bangkok");
        }
        else
        {
            $pembelian->tanggal_transaksi = Carbon::parse($data['tanggal_transaksi']);
        }
        // dd($data);
        if(!empty($data['kredit']))
        {
            $pembelian->tanggal_jatuh_tempo = Carbon::parse($data['jatuhtempo']);
            $pembelian->jenis_pembelian = 1;
            //$this->kredit($req->input('id_pelanggan'),$req->input('harga_akhir'));
        }
        else
        {
            $pembelian->tanggal_jatuh_tempo = null;
            $pembelian->jenis_pembelian = 2;
        }
        $pembelian->total = $data['total_harga'];
/*        $pembelian->diskon = $data['diskon_transaksi'];
        $pembelian->potongan = $data['potongan_harga'];
        $pembelian->total_akhir = $data['harga_akhir'];
        $pembelian->kembalian = $data['uang_kembalian'];
        $pembelian->uang_dibayar = $data['uang_tunai'];*/
        $pembelian->save();

        //dd($pembelian);
        $this->inputdetail($data['id_barang'],$data['jumlah_barang'],$data['subtotal'],$pembelian->id,$data['harga_barang']);
        return $pembelian;
    }
    public function inputdetail($barang,$jumlah,$subtotal,$pembelian,$harga_satuan)
    {
       
        foreach ($barang as $key => $value) {
            $detail = new Pembelian_detail;
            //dd($key,$value);
            $detail->pembelian_id = $pembelian;
            $detail->barang_id = $value;
            $detail->jumlah = $jumlah[$key];
            $detail->total_satuan = $subtotal[$key];
            $detail->harga_satuan = $harga_satuan[$key];
            $detail->save();
            app('App\Http\Controllers\BarangController')->createDetail($detail,1);
        }
        return;
    }

    public function editDetail(request $data, $id)
    {
        $edit = BarangDetail::where('id',$id)->first();
        $edit->harga_beli = $data['harga_beli'];
        $edit->stok = $data['stok_barang'];
        if($edit->save()){
            $data->session()->flash('alert-success', 'Data barang berhasil diperbarui.');
            return redirect('/barang/detail/'.$id.'');
        }
        else{
            $data->session()->flash('alert-danger', 'Data barang gagal diperbarui.');
            return redirect('/barang/detail/'.$id.'');
        }
    }
}
