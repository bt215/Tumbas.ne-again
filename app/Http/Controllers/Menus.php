<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class Menus extends Controller
{
    public function get_menu($id_kantin)
    {
    	$data["menus"] = Menu::where("id_kantin",$id_kantin)->get();
    	$data["id_kantin"] = $id_kantin;
    	return view("menu", $data);
    }

    public function search(Request $request)
    {
        $data["menus"] = Menus::where("id_menu","like","%$request->search%")
        ->orWhere("nama_menu","like","%$request->search%")->paginate(4);

        $data["count"] = Menus::where("id_menu","like","%$request->search%")
        ->orWhere("nama_menu","like","%$request->search%")->count();

        return view('menu', $data);
    }

    public function save_menu(Request $request)
    {
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$menu = new Menu();
                $id_menu = rand(1,9999);
    			$menu->id_menu = $id_menu;
    			$menu->id_kantin = $request->id_kantin;
    			$menu->nama_menu = $request->nama_menu;
    			$menu->deskripsi = $request->deskripsi;
    			$menu->harga = $request->harga;
                $file = $request->image;
                $fileName = $id_menu."-".date("Ymd").".".$file->extension();
                $menu->image = $fileName;
                $file->storeAs('public/fotoMenu', $fileName);
    			$menu->save();
    		}else if($action == "update"){
    			$menu = Menu::where("id_menu", $request->id_menu)->first();
                if ($request->hasFile("image")) {
                    $path = public_path('storage/fotoMenu'.$menu->image);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                    $file = $request->image;
                    $fileName = $request->id_menu."-".date("Ymd").".".$file->extension();
                    $menu->image = $fileName;
                    $file->storeAs('public/fotoMenu', $fileName);
                }
    			$menu->nama_menu = $request->nama_menu;
                $menu->deskripsi = $request->deskripsi;
                $menu->harga = $request->harga;
    			$menu->save();
    		}
    		return redirect("menu/$request->id_kantin")->with("message", "Data berhasil disimpan");
    	} catch (Exception $e) {
    		return redirect("menu/$request->id_kantin")->with("message", $e->getMessage());
    	}
    }    

    public function delete_menu($id_menu)
    {
        try {
            $menu = Menu::where("id_menu",$id_menu)->first();
            $path = public_path('storage/fotoMenu/'.$menu->image);
            if ($path) {
                unlink($path);
            }
            Menu::where("id_menu",$id_menu)->delete();
            return redirect("menu/".$menu->id_kantin)->with("message", "Data berhasil dihapus");
        } catch (Exception $e) {
            return redirect("menu/")->with("message", $e->getMessage());
        }
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }
}
