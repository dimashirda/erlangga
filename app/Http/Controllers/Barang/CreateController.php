<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\BarangDetail;

class CreateController extends Controller
{
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
            $a->harga_jual = $req->input('harga_jual');
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
    public function simpanDetail(Request $request)
    {   
        $query = BarangDetail::where('barang_id',$request->barang_id)
                            ->where('harga_beli',$request->harga_beli)
                            ->get();
        //dd($query);
        if(count($query) == 0)
        {
            $detail = new BarangDetail;
            $detail->barang_id = $request->barang_id;
            $detail->jumlah = $request->jumlah;
            $detail->harga_beli = $request->harga_beli;
            if($detail->save())
            {
                $request->session()->flash('alert-success', 'Data barang telah ditambahkan.');
                return redirect ('/barang/detail/'.$request->barang_id.'');
            }
            else
            {
                $request->session()->flash('alert-danger', 'Data barang gagal ditambahkan.');
                return redirect ('/barang/detail/'.$request->barang_id.'');
            }
        }
        else
        {
            $request->session()->flash('alert-danger', 'Data barang gagal ditambahkan. Harga sudah ada');
                return redirect ('/barang/detail/'.$request->barang_id.'');   
        }
        
    }
    public function edit(request $data, $id)
    {
        $edit = Barang::where('id',$id)->first();
        $edit->kode = $data['kode_barang'];
        $edit->nama = $data['nama_barang'];
        $edit->harga_jual = $data['harga_jual'];
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

    public function editDetail(request $data, $id)
    {
        $edit = BarangDetail::where('id',$id)->first();
        $edit->harga_jual = $data['harga_jual'];
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

    public function deleteDetail($id)
    {   
        $barang_detail = BarangDetail::find($id);
        $barang_detail->delete();
        return back();
    }
}
