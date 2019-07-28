<?php

namespace App\Http\Controllers\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\BarangDetail;
use DataTables;
use Auth;
class ReadController extends Controller
{
    public function all()
    {
    	$barang = Barang::with('barang_detail')->get();
        return DataTables::of($barang)
        	->addColumn('stok', function($barang){
        		$total_stok = 0;
        		foreach($barang->barang_detail as $item)
                	$total_stok += $item->jumlah;
        		return '<td>'.$total_stok.'</td>';
        	})
        	->addColumn('detail', function($barang){
        		return '<td><a href="'.url('/barang/detail/'.$barang->id).'"><button type="button" class="btn btn-info">Detail</button></a></td>';
        	})
        	->addColumn('aksi', function($barang){
        		if(Auth::User()->role == 1)
        			return '<td align="center" width="30px">
	                            <button type="button" class="btn btn-default edit-button" data-toggle="modal" 
	                            data-target="#modal-default" data-id="'.$barang->id.'" data-kode="'.$barang->kode.'" 
	                            data-name="'.$barang->nama.'" 
	                            data-hargajual="'.$barang->harga_jual.'" data-satuan="'.$barang->satuan.'">
	                                Edit
	                            </button>
	                        </td>
	                        <td align="center" width="30px">
                                <button type="button" class="btn btn-danger delete-button" data-name="'.$barang->nama.'" 
                                data-id="'.$barang->id.'" data-toggle="modal" data-target="#modal-danger">
                                    Hapus
                                </button>
                            </td>';
        		else
        			return;
        	})
        	->escapeColumns([])
            ->make(true);
    }
}
