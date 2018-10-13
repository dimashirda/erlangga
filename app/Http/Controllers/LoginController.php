<?php

namespace App\Http\Controllers;

use DB;
use App\Regis_user;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
    	return view('login');
    }

    public function create(Request $data)
    {
    	$cek = Regis_user::where('username',$data->username)->first();
    	if(count($cek))
    	{
    		$request->session()->flash('alert-danger', 'Data pegawai gagal ditambahkan. USERNAME sudah digunakan.');
            return redirect('/');
    	}
    	else
    	{
    		$user = new Regis_user;
    		$user->username = $data->input('username');
    		$user->password = $data->input('password');
    	}
    }
    public function login()
    {
    	
    }
}
