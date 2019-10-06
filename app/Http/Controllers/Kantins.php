<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantin;

class Kantins extends Controller
{
    public function get_kantin()
    {
    	$data["kantins"] = Kantin::paginate(4);
    	return view("kantin", $data);
    }

    public function search(Request $request)
    {
        $data["kantins"] = Kantin::where("id_kantin","like","%$request->search%")
        ->orWhere("nama_kantin","like","%$request->search%")
        ->orWhere("no_telp","like","%$request->search%")->paginate(4);

        $data["count"] = Kantin::where("id_kantin","like","%$request->search%")
        ->orWhere("nama_kantin","like","%$request->search%")
        ->orWhere("no_telp","like","%$request->search%")->count();

        return view('kantin', $data);
    }

    public function save_kantin(Request $request)
    {
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$kantin = new Kantin();
                $id_penjual = rand(1,9999);
                $kantin->id_penjual = $id_penjual;
    			$kantin->nama_kantin = $request->nama_kantin;
                $kantin->nama_penjual = $request->nama_penjual;
    			$kantin->no_telp = $request->no_telp;
    			$kantin->saldo = $request->saldo;
                $kantin->username = $request->username;
                $kantin->password = md5($request->password);

                $file1 = $request->image_penjual;
                $fileName = $id_penjual."-".date("Ymd").".".$file1->extension();
                $kantin->image_penjual = $fileName;
                $file1->storeAs('public/fotoPenjual', $fileName);

                $file2 = $request->image_kantin;
                $fileName = $kantin->id_kantin."-".date("Ymd").".".$file1->extension();
                $kantin->image_kantin = $fileName;
                $file2->storeAs('public/fotoKantin', $fileName);

    			$kantin->save();
    		}else if($action == "update"){
    			$kantin = Kantin::where("id_kantin", $request->id_kantin)->first();
                if ($request->hasFile("image_penjual")) {
                    $path1 = public_path('storage/fotoPenjual'.$kantin->image_penjual);
                    if (file_exists($path1)) {
                        unlink($path1);
                    }
                    $file1 = $request->image_penjual;
                    $fileName = $request->id_penjual."-".date("Ymd").".".$file1->extension();
                    $kantin->image_penjual = $fileName;
                    $file1->storeAs('public/fotoPenjual', $fileName);
                }
                if ($request->hasFile("image_kantin")) {
                    $path2 = public_path('storage/fotoKantin'.$kantin->image_kantin);
                    if (file_exists($path2)) {
                        unlink($path2);
                    }
                    $file2 = $request->image_kantin;
                    $fileName = $request->id_kantin."-".date("Ymd").".".$file2->extension();
                    $kantin->image_kantin = $fileName;
                    $file2->storeAs('public/fotoKantin', $fileName);
                }
    			$kantin->nama_kantin = $request->nama_kantin;
                $kantin->nama_penjual = $request->nama_penjual;
                $kantin->no_telp = $request->no_telp;
                $kantin->saldo = $request->saldo;
                $kantin->username = $request->username;
                $kantin->password = md5($request->password);
    			$kantin->save();
    		}
    		return redirect("kantin")->with("message", "Data berhasil disimpan");
    	} catch (Exception $e) {
    		return redirect("kantin")->with("message", $e->getMessage());
    	}
    }    

    public function delete_kantin($id_kantin)
    {
        try {
            $kantin = Kantin::where("id_kantin",$id_kantin)->first();
            $path1 = public_path('storage/fotoPenjual/'.$kantin->image_penjual);
            if ($path1) {
                unlink($path1);
            }
            $path2 = public_path('storage/fotoKantin/'.$kantin->image_kantin);
            if ($path2) {
                unlink($path2);
            }
            Kantin::where("id_kantin",$id_kantin)->delete();
            return redirect("kantin")->with("message", "Data berhasil dihapus");
        } catch (Exception $e) {
            return redirect("kantin")->with("message", $e->getMessage());
        }
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }
}
