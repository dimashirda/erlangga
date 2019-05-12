<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Generator extends Controller
{
    public function generate()
    {
        $start = Carbon::createFromFormat('d/m/Y','1/8/2014');
        $start = $start->startOfDay();
        $end = $start->endOfYear();
        $period = CarbonPeriod::create($start,$end);
        $result = [];
        foreach ($period as $date) 
        {   
            dd($date);
            array_push($result,$date);
        } 
    }
}
