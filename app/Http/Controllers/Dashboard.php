<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kantin;
use App\Pembeli;
use App\Admin;
use App\Detail_Cart;

class Dashboard extends Controller
{

    public function ambil()
    {
    	$data["kantin"] = Kantin::count();
    	$data["pembeli"] = Pembeli::count();
    	$data["admin"] = Admin::count();
        $data["detail_cart"] = Detail_Cart::count();

        $data["kantins"] = Kantin::all();
        $data["pembelis"] = Pembeli::all();
        $data["admins"] = Admin::all();
        $data["detail_carts"] = Detail_Cart::all();

    	return view('dashboard', $data);
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }

    public function isi_saldo_pembeli(Request $request)
    {
        $isi_saldo_pembeli = Pembeli::where("id_pembeli", $request->id_pembeli)->first(); 
        $isi_saldo_pembeli->saldo = $isi_saldo_pembeli->saldo + $request->saldo_pembeli;
        $isi_saldo_pembeli->save();
        // echo $isi_saldo_pembeli;
        return redirect("dashboard")->with("message", "Isi Ulang Berhasil");
    }

    public function isi_saldo_penjual(Request $request)
    {
        $isi_saldo_penjual = Kantin::where("id_kantin", $request->id_kantin)->first(); 
        $isi_saldo_penjual->saldo = $isi_saldo_penjual->saldo + $request->saldo_penjual;
        $isi_saldo_penjual->save();
        // echo $isi_saldo_pembeli;
        return redirect("dashboard")->with("message", "Isi Ulang Berhasil");
    }
}
