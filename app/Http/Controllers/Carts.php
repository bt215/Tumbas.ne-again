<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Detail_Cart;
use App\Menu;
use App\Kantin;
use App\Pembeli;
use Session;

class Carts extends Controller
{
    public function index()
    {
    	$data["carts"] = Session::get('cart');
    	return view('cart_pembeli', $data);
    }

    public function addCart(Request $request)
    {
    	$carts = Session::get('cart');
    	$menu = Menu::where('id_menu', $request->id_menu)->first();
    	$cart = [
    		'menu' => $menu, 'jumlah' => $request->jumlah
    	];
    	array_push($carts, $cart);
    	Session::put('cart', $carts);
    	return redirect('page_menu/'.$menu->id_kantin);
    }

    public function save_cart(Request $request)
    {
    	$pesan = new Cart();
    	$menu = Menu::where('id_menu', $request->id_menu)->first();
    	$id_pesan = rand(1,999).rand(1,9999);
    	$pesan->id_pesan = $id_pesan;
    	$id_pembeli = Session::get('pembeli')->id_pembeli;
    	$pesan->id_pembeli = $id_pembeli;
    	$pesan->tanggal_beli = date('Y-m-d');
    	$pesan->save();

    	foreach (Session::get('cart') as $cart) {
    		$detail_pesan = new Detail_Cart();
    		$detail_pesan->id_pesan = $id_pesan;
            $id_kantin = $cart['menu']->id_kantin;
    		$detail_pesan->id_kantin = $id_kantin;
            $id_pembeli = Session::get('pembeli')->id_pembeli;
    		$detail_pesan->id_pembeli = $id_pembeli;
            $id_menu = $cart["menu"]->id_menu;
    		$detail_pesan->id_menu = $id_menu;
    		$detail_pesan->jumlah = $cart["jumlah"];
    		$detail_pesan->harga = $cart["menu"]->harga;
            $total_harga = $cart['menu']->harga*$cart["jumlah"];
            $detail_pesan->total_harga = $total_harga;

            $pembeli = Pembeli::where('id_pembeli', $id_pembeli)->first();
            $pembeli->saldo = $pembeli->saldo-$total_harga;
            $pembeli->save();

            $menu = Menu::where('id_menu', $id_menu)->first();

            $kantin = Kantin::where('id_kantin', $id_kantin)->first();
            $kantin->saldo = $kantin->saldo+($cart['menu']->harga*$cart["jumlah"]);
            $kantin->save();

            $detail_pesan->tanggal_beli = date('Y-m-d');
    		$detail_pesan->save();
    	}
    	// echo $pesan;
    	Session::put('cart',[]);
    	return redirect('/page_kantin');
    }
}
