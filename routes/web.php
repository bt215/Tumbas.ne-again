<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/dashboard", "Dashboard@ambil");
Route::post('/isi_ulang_pembeli', 'Dashboard@isi_saldo_pembeli');
Route::post('/isi_ulang_penjual', 'Dashboard@isi_saldo_penjual');

Route::get('/admin', 'Admins@get_admin');
Route::post('/save_admin', 'Admins@save_admin');
Route::get('/delete_admin/{id_admin}', 'Admins@delete_admin');
Route::post('admin/search', 'Admins@search');

Route::get('/kantin', 'Kantins@get_kantin');
Route::post('/save_kantin', 'Kantins@save_kantin');
Route::get('/delete_kantin/{id_kantin}', 'Kantins@delete_kantin');
Route::post('kantin/search', 'Kantins@search');

Route::get('/menu/{id_kantin}', 'Menus@get_menu');
Route::post('/save_menu', 'Menus@save_menu');
Route::get('/delete_menu/{id_menu}', 'Menus@delete_menu');
Route::post('menu/search', 'Menus@search');

Route::get('/pembeli', 'Pembelis@get_pembeli');
Route::post('/save_pembeli', 'Pembelis@save_pembeli');
Route::get('/delete_pembeli/{id_pembeli}', 'Pembelis@delete_pembeli');
Route::post('pembeli/search', 'Pembelis@search');

Route::get('/login_admin', 'Login@index');
Route::post('/check_login', 'Login@check');
Route::get('/logout_admin', 'Login@logout');

Route::get('/page_beranda_pembeli', function () {
    return view('page_beranda_pembeli');
});

Route::get('/page_kantin', 'Canteen@get_kantin');
Route::post('page_kantin/search', 'Canteen@search');

Route::get('/page_menu/{id_kantin}', 'Menuu@get_menu');
Route::post('page_menu/search', 'Menuu@search');

Route::get('/login_pembeli', 'Login_Pembeli@index');
Route::post('/check_login_pembeli', 'Login_Pembeli@check');
Route::get('/logout_pembeli', 'Login_Pembeli@logout');

Route::get('/register_pembeli', 'Register@register');
Route::post('/save_register', 'Register@save_register');

Route::get('/cart_pembeli', 'Carts@index');
Route::post('/addCart', 'Carts@addCart');
Route::post('/save_cart', 'Carts@save_cart');

Route::get('/laporan', 'Laporan@index');
Route::post('laporan/search', 'Laporan@search');
Route::get('/delete_laporan/{id_pesan}', 'Laporan@delete_laporan');