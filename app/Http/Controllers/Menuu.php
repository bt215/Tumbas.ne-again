<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class Menuu extends Controller
{
    public function get_menu($id_kantin)
    {
    	$data["menus"] = Menu::where("id_kantin",$id_kantin)->get();
    	$data["id_kantin"] = $id_kantin;
    	return view("page_menu", $data);
    }

    public function search(Request $request)
    {
        $data["menus"] = Menus::where("id_menu","like","%$request->search%")
        ->orWhere("nama_menu","like","%$request->search%")->paginate(4);

        $data["count"] = Menus::where("id_menu","like","%$request->search%")
        ->orWhere("nama_menu","like","%$request->search%")->count();

        return view('page_menu', $data);
    }
}
