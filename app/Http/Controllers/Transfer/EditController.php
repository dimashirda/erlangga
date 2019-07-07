<?php

namespace App\Http\Controllers\Transfer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transfer;
use Carbon\Carbon;
class EditController extends Controller
{
    public function konfirmasi($id)
    {
    	$transfer = Transfer::where('id',$id)->first();
    	$transfer->confirmed_at = Carbon::now();
    	$transfer->save();
    	return $transfer;
    }
}
