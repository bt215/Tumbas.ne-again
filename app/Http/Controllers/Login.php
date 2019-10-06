<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;

class Login extends Controller
{
    public function index()
    {
    	return view('login_admin');
    }

    public function check(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;

    	$data = Admin::where("username", $username)->where("password", md5($password));
    	if ($data->count() > 0) {
    		Session::put("logged_in_admin", true);
    		Session::put("admin", $data->first());
    		return redirect("dashboard");
    	}else{
    		return redirect("login_admin")->with("message", "Username/Password tidak cocok!");
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('login_admin');
    }
}
