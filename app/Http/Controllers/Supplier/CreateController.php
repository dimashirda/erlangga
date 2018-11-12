<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class CreateController extends Controller
{
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
            $a->nama = $req->input('nama_supplier');
            $a->alamat = $req->input('alamat');
            $a->kota = $req->input('kota');
            $a->telepon = $req->input('nomor');
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
        $edit->nama = $data['nama_supplier'];
        $edit->alamat = $data['alamat'];
        $edit->kota = $data['kota'];
        $edit->telepon = $data['nomor'];
        if($edit->save()){
            $data->session()->flash('alert-success', 'Data supplier berhasil diperbarui.');
            return redirect('/supplier');
        }
        else{
            $data->session()->flash('alert-danger', 'Data supplier gagal diperbarui.');
            return redirect('/supplier');
        }
    }
}
