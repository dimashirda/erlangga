<?php

namespace App\Http\Controllers;

use DB;
use App\Barang;
use App\BarangDetail;
use Illuminate\Http\Request;

class BarangController extends Controller
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
    public function simpan(request $req)
    {   
        //dd($req);
        $cek = Barang::where('kode',$req->input('kode_barang'))->count();
        //dd($cek);
        if($cek > 0){
            $req->session()->flash('alert-danger', 'Data barang gagal ditambahkan. Kode Barang sudah digunakan!!.');
            return redirect ('/barang');
        }
        else
        {   
            //dd($req); 
            $a = new Barang();
            $a->kode = $req->input('kode_barang');
            $a->nama = $req->input('nama_barang');
            $a->harga_beli = $req->input('harga_beli');
            $a->harga_jual = $req->input('harga_jual');
            $a->stok = $req->input('stok_barang');
            $a->satuan = $req->input('satuan_barang');

            if($a->save())
            {
                $req->session()->flash('alert-success', 'Data barang telah ditambahkan.');
                return redirect ('/barang');
            }
            else
            {
                $req->session()->flash('alert-danger', 'Data barang gagal ditambahkan.');
                return redirect ('/barang');
            }
        }
    }
    public function edit(request $data, $id)
    {
        $edit = Barang::where('id',$id)->first();
        $edit->kode = $data['kode_barang'];
        $edit->nama = $data['nama_barang'];
        $edit->harga_beli = $data['harga_beli'];
        $edit->harga_jual = $data['harga_beli'];
        $edit->stok = $data['stok_barang'];
        $edit->satuan = $data['satuan_barang'];
        if($edit->save()){
            $data->session()->flash('alert-success', 'Data barang berhasil diperbarui.');
            return redirect('/barang');
        }
        else{
            $data->session()->flash('alert-danger', 'Data barang gagal diperbarui.');
            return redirect('/barang');
        }
    }
    public function delete(Request $data, $id_barang)
    {
        $del = Barang::where('id',$id_barang);
        if($del->delete()){        
            $data->session()->flash('alert-success', 'Data barang berhasil dihapus.');
            return redirect ('/barang');
        }
        else{
            $data->session()->flash('alert-danger', 'Data barang gagal dihapus.');
            return redirect ('/barang');
        }
    }
    public function createDetail($data,$flag)
    {   
        $query = BarangDetail::where('barang_id',$data->barang_id)
                            ->where('harga_beli',$data->harga_satuan)
                            ->first();
        if(!empty($query))
        {
            $query->jumlah += $data->jumlah;
            $query->save();
            app('App\Http\Controllers\LogController')->create($data,$flag,$query->id);
            return;
        }
        else
        {
            $detail = new BarangDetail;
            $detail->barang_id = $data->barang_id;
            $detail->jumlah = $data->jumlah;
            $detail->harga_beli = $data->harga_satuan;
            $detail->save();
            app('App\Http\Controllers\LogController')->create($data,$flag,$detail->id);
            return;    
        }
    }
}
