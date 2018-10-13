<?php

namespace App\Http\Controllers;

use DB;
use App\Regis_user
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {	
    	/*$search = \Request::get('search');
        $category = \Request::get('kategori');
        if($category == "nama")
        {
            $acc = DB::table('anak_perusahaans')
            ->where('nama_perusahaan','like','%'.$search.'%')
            ->orderBy('nama_perusahaan')
            ->paginate(25);
        }
        elseif($category == "ID")
        {
            $acc = DB::table('anak_perusahaans')
            ->where('id_perusahaan','like','%'.$search.'%')
            ->orderBy('id_perusahaan')
            ->paginate(25);
        }
        else*/
        $acc = Regis_user::paginate(25);
        //dd($acc);
    	return view('user',['acc'=>$acc])->with('nav','user');
    }
    public function tambah()
    {
    	return view('tambahuser')->with('nav','user');
    }
    public function simpan(request $req)
    {   
        //dd($req);
        $cek = Barang::where('id',$req->input('id_barang'))->count();
        //dd($cek);
        if($cek > 0){
            $req->session()->flash('alert-danger', 'Data barang gagal ditambahkan. ID Barang sudah digunakan!!.');
            return redirect ('/barang');
        }
        else
        {   
            //dd($req); 
            $a = new Barang();
            $a->id = $req->input('id_barang');
            $a->nama_barang = $req->input('nama_barang');
            $a->harga_beli = $req->input('harga_beli');
            $a->harga_jual = $req->input('harga_jual');
            $a->stok_barang = $req->input('stok_barang');
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
    public function edit(request $data, $id_barang)
    {
        $edit = Barang::where('id',$id_barang)->first();
        $edit->nama_barang = $data['nama_barang'];
        $edit->harga_beli = $data['harga_beli'];
        $edit->harga_jual = $data['harga_beli'];
        $edit->stok_barang = $data['stok_barang'];
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
}
