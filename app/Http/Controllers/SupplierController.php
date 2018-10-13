<?php

namespace App\Http\Controllers;

use App\Supplier;
use DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
    	$acc = Supplier::paginate(25);
    	return view('supplier',['acc'=>$acc])->with('nav','supplier');
    }
    public function tambah()
    {
    	return view('tambahsupplier')->with('nav','supplier');
    }
    public function simpan(request $req)
    {   
        //dd($req);
        $cek = Supplier::where('id',$req->input('id_supplier'))->count();
        //dd($cek);
        if($cek > 0){
            $req->session()->flash('alert-danger', 'Data supplier gagal ditambahkan. ID Supplier sudah digunakan!!.');
            return redirect ('/supplier');
        }
        else
        {   
            //dd($req); 
            $a = new Supplier();
            //$a->id = $req->input('id_supplier');
            $a->nama_supplier = $req->input('nama_supplier');
            $a->alamat_supplier = $req->input('alamat');
            $a->kota = $req->input('kota');
            $a->no_telepon = $req->input('nomor');
            if($a->save())
            {
                $req->session()->flash('alert-success', 'Data supplier telah ditambahkan.');
                return redirect ('/supplier');
            }
            else
            {
                $req->session()->flash('alert-danger', 'Data supplier gagal ditambahkan.');
                return redirect ('/supplier');
            }
        }
    }
    public function edit(request $data, $id_supplier)
    {
        $edit = Supplier::where('id',$id_supplier)->first();
        $edit->nama_supplier = $data['nama_supplier'];
        $edit->alamat_supplier = $data['alamat'];
        $edit->kota = $data['kota'];
        $edit->no_telepon = $data['nomor'];
        if($edit->save()){
            $data->session()->flash('alert-success', 'Data supplier berhasil diperbarui.');
            return redirect('/supplier');
        }
        else{
            $data->session()->flash('alert-danger', 'Data supplier gagal diperbarui.');
            return redirect('/supplier');
        }
    }
    public function delete(Request $data, $id_supplier)
    {
        $del = Supplier::where('id',$id_supplier);
        if($del->delete()){        
            $data->session()->flash('alert-success', 'Data supplier berhasil dihapus.');
            return redirect ('/supplier');
        }
        else{
            $data->session()->flash('alert-danger', 'Data supplier gagal dihapus.');
            return redirect ('/supplier');
        }
    }
}
