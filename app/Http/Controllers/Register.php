<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;

class Register extends Controller
{
    public function register()
    {
        return view('register_pembeli');
    }

    public function save_register(Request $request)
    {
        try {
            $pembeli = new Pembeli();
            $id_pembeli = rand(1,9999);
            $pembeli->id_pembeli = $id_pembeli;
            $pembeli->nama = $request->nama;
            $pembeli->kelas = $request->kelas;
            $pembeli->email = $request->email;
            $pembeli->no_telp = $request->no_telp;
            $pembeli->saldo = $request->saldo;
            $pembeli->username = $request->username;
            $password = $request->password;
            $pembeli->password = $password;
            $file = $request->image;
            $fileName = $id_pembeli."-".date("Ymd").".".$file->extension();
            $pembeli->image = $fileName;
            $file->storeAs('public/fotoPembeli',$fileName);
            $pembeli->save();
            return redirect("login_pembeli")->with("message","Register berhasil, silakan login!!");
        } catch (\Exception $e) {
            return redirect("login_pembeli")->with("message",$e->getMessage());
        }
    }
}
