<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;
use Session;

class Login_Pembeli extends Controller
{
    public function index()
    {
    	return view('login_pembeli');
    }

    public function check(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;

    	$data = Pembeli::where("username", $username)->where("password", md5($password));
    	if ($data->count() > 0) {
    		Session::put("logged_in", true);
    		Session::put("pembeli", $data->first());

            Session::put("cart", array());
    		return redirect("page_kantin");
    	}else{
    		return redirect("login_pembeli")->with("message", "Username/Password tidak cocok!");
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('page_beranda_pembeli');
    }

    
}
