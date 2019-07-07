<?php

namespace App\Http\Controllers\Giro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PostController extends Controller
{
    public function konfirmasi(Request $request)
    {
    	try {
    		DB::beginTransaction()
    		app('App\Http\Controllers\Giro\EditController')->konfirmasi($request->giro_id);	
    	} catch (Exception $e) {
    		
    	}
    }
}
