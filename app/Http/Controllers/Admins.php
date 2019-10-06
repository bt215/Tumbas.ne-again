<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class Admins extends Controller
{
    public function get_admin()
    {
    	$data["admins"] = Admin::paginate(4);
    	return view("admin", $data);
    }

    public function search(Request $request)
    {
        $data["admins"] = Admin::where("id_admin","like","%$request->search%")
        ->orWhere("nama","like","%$request->search%")
        ->orWhere("no_telp","like","%$request->search%")->paginate(4);

        $data["count"] = Admin::where("id_admin","like","%$request->search%")
        ->orWhere("nama","like","%$request->search%")
        ->orWhere("no_telp","like","%$request->search%")->count();

        return view('admin', $data);
    }

    public function save_admin(Request $request)
    {
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$admin = new Admin();
                $id_admin = rand(1,9999);
    			$admin->id_admin = $id_admin;
    			$admin->nama = $request->nama;
    			$admin->email = $request->email;
    			$admin->no_telp = $request->no_telp;
                $admin->username = $request->username;
                $admin->password = md5($request->password);
                $file = $request->image;
                $fileName = $id_admin."-".date("Ymd").".".$file->extension();
                $admin->image = $fileName;
                $file->storeAs('public/fotoAdmin', $fileName);
    			$admin->save();
    		}else if($action == "update"){
    			$admin = Admin::where("id_admin", $request->id_admin)->first();
                if ($request->hasFile("image")) {
                    $path = public_path('storage/fotoAdmin'.$admin->image);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                    $file = $request->image;
                    $fileName = $request->id_admin."-".date("Ymd").".".$file->extension();
                    $admin->image = $fileName;
                    $file->storeAs('public/fotoAdmin', $fileName);
                }
    			$admin->nama = $request->nama;
                $admin->email = $request->email;
                $admin->no_telp = $request->no_telp;
                $admin->username = $request->username;
                $admin->password = md5($request->password);
    			$admin->save();
    		}
    		return redirect("admin")->with("message", "Data berhasil disimpan");
    	} catch (Exception $e) {
    		return redirect("admin")->with("message", $e->getMessage());
    	}
    }    

    public function delete_admin($id_admin)
    {
        try {
            $admin = Admin::where("id_admin",$id_admin)->first();
            $path = public_path('storage/fotoAdmin/'.$admin->image);
            if ($path) {
                unlink($path);
            }
            Admin::where("id_admin",$id_admin)->delete();
            return redirect("admin")->with("message", "Data berhasil dihapus");
        } catch (Exception $e) {
            return redirect("admin")->with("message", $e->getMessage());
        }
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }
}
