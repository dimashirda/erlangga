<?php

namespace App\Http\Controllers\Giro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Giro;
use Carbon\Carbon;
class EditController extends Controller
{
    public function konfirmasi($id)
    {
    	$giro = Giro::where('id',$id)->first();
    	$giro->konfirmasi = 1;
    	$giro->confirmed_at = Carbon::now();
    	$giro->save();
    	return $giro;
    }
}
