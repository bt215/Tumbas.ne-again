<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_Cart;
use App\Kantin;
use App\Menu;
use App\Cart;
use App\Pembeli;
use App\Admin;
use Session;

class Laporan extends Controller
{
    public function index()
    {
    	// $data["carts"] = Cart::all();
    	$data['detail'] = Detail_Cart::all();
    	// $data["detail"] = Cart::all();
    	return view("laporan", $data);
    }

    public function search(Request $request)
    {
        $data["detail"] = Detail_Cart::where("id_pesan","like","%$request->search%")
        ->orWhere("tanggal_beli","like","%$request->search%")->paginate(5);

        $data["count"] = Detail_Cart::where("id_pesan","like","%$request->search%")
        ->orWhere("tanggal_beli","like","%$request->search%")->count();

        return view('laporan', $data);
    }

    public function delete_laporan($id_pesan)
    {
        try {
            $detail = Detail_Cart::where("id_pesan",$id_pesan)->first();
            Detail_Cart::where("id_pesan",$id_pesan)->delete();
            return redirect("laporan")->with("message", "Data berhasil dihapus");
        } catch (Exception $e) {
            return redirect("laporan")->with("message", $e->getMessage());
        }
    }

}
