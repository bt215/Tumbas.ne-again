<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantin;

class Canteen extends Controller
{
    public function get_kantin()
    {
    	$data["kantins"] = Kantin::paginate(4);
    	return view("page_kantin", $data);
    }

    public function search(Request $request)
    {
        $data["kantins"] = Kantin::where("id_kantin","like","%$request->search%")
        ->orWhere("nama_kantin","like","%$request->search%")
        ->orWhere("no_telp","like","%$request->search%")->paginate(4);

        $data["count"] = Kantin::where("id_kantin","like","%$request->search%")
        ->orWhere("nama_kantin","like","%$request->search%")
        ->orWhere("no_telp","like","%$request->search%")->count();

        return view('page_kantin', $data);
    }

}
