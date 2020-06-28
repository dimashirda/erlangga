<?php

namespace App\Http\Controllers\Pembelian;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use DataTables;

class ReadController extends Controller
{
    public function all()
    {
    	$pembelian = Pembelian::with('users','suplier')->orderBy('tanggal_transaksi','desc')->get();
        // dd($pembelian);
        return DataTables::of($pembelian)
            ->addColumn('nomor',function($pembelian){
                $nomor = $pembelian->id + 20000;
              return 'PB '.$nomor;
            })
            ->addColumn('users',function($pembelian){
                return $pembelian->users->name;
            })
            ->addColumn('suplier', function($pembelian){
                return $pembelian->suplier->nama;
            })
            ->addColumn('jenis',function($pembelian){
                if($pembelian->jenis_pembelian == 1)
                    return 'Kredit';
                else
                    return 'Tunai';
            })
            ->addColumn('detail',function($pembelian){
                return '<td align="center" width="30px">
                            <a class="btn btn-default edit-button" 
                            href="'.url('pembelian/detail/'.$pembelian->id.'').'">
                                Detail
                            </a>
                        </td>';
            })
            ->escapeColumns([])
            ->make(true);
    }
}
