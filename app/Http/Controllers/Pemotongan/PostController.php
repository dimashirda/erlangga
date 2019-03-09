<?php

namespace App\Http\Controllers\Pemotongan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PostController extends Controller
{
    public function tambahStok(Request $req)
    {	
		try 
		{
			DB::beginTransaction();
			//dd($req);
			$data = $req->all();
			//dd($data);
			$result = app('App\Http\Controllers\Pemotongan\CreateController')->tambahStok($data);
    		
    		DB::commit();
    		$req->session()->flash('alert-success', 'Pemotongan Berhasil Dilakukan');
            return redirect ('/pemotongan-stok');

		} 
		catch (Exception $e) 
		{	
			DB::rollBack();
			$req->session()->flash('alert-danger', 'Pemotongan Gagal Dilakukan');
            return redirect ('/pemotongan-stok');
			//dd($e)	
		}
	
    }
}
