<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembeli;

class Pembelis extends Controller
{
    public function get_pembeli()
    {
      $data["pembelis"] = Pembeli::paginate(5);
      return view("pembeli", $data);
    }

    public function save_pembeli(Request $request)
    {
      try {
        $action = $request->action;
        if ($action == "insert") {
            $pembeli = new Pembeli();
            $id_pembeli = rand(1,9999);
            $pembeli->id_pembeli = $id_pembeli;
            $pembeli->nama = $request->nama;
            $pembeli->kelas = $request->kelas;
            $pembeli->email = $request->email;
            $pembeli->no_telp = $request->no_telp;
            $pembeli->saldo = $request->saldo;
            $pembeli->username = $request->username;
            $pembeli->password = md5($request->password);
            $file = $request->image;
            $fileName = $id_pembeli."-".date("Ymd").".".$file->extension();
            $pembeli->image = $fileName;
            $file->storeAs('public/fotoPembeli',$fileName);
            $pembeli->save();
        } else if($action == "update"){
            $pembeli = Pembeli::where("id_pembeli",$request->id_pembeli)->first();
            $pembeli->nama = $request->nama;
            $pembeli->kelas = $request->kelas;
            $pembeli->email = $request->email;
            if ($request->hasFile("image")) {
                $path = public_path('storage/fotoPembeli'.$pembeli->image);
                if (file_exists($path)) {
                    unlink($path);
                }
                $file = $request->image;
                $fileName = $request->id_pembeli."-".date("Ymd").".".$file->extension();
                $pembeli->image = $fileName;
                $file->storeAs('public/fotoPembeli', $fileName);
            }
            $pembeli->no_telp = $request->no_telp;
            $pembeli->saldo = $request->saldo;
            $pembeli->username = $request->username;
            $pembeli->password = md5($request->password);
            $pembeli->save();
        }
        return redirect("pembeli")->with("message","Data berhasil disimpan");
      } catch (\Exception $e) {
        return redirect("pembeli")->with("message",$e->getMessage());
      }
    }

    public function delete_pembeli($id_pembeli)
    {
      try {
          $pembeli = Pembeli::where("id_pembeli",$id_pembeli)->delete();
          $path = public_path('storage/fotoPembeli/'.$pembeli->image);
                  if ($path) {
                      unlink($path);
                  }
                  Pembeli::where("id_pembeli",$id_pembeli)->delete();
          return redirect("pembeli")->with("message","Data berhasil dihapus!");
      } catch (\Exception $e) {
          return redirect("pembeli")->with("message",$e->getMessage());
      }
    }

    public function __construct()
      {
          $this->middleware("check_login");
      }
}
