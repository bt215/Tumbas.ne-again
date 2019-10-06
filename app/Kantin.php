<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    protected $table = "kantin";
    protected $primaryKey = "id_kantin";
    protected $fillable = ["id_kantin", "id_penjual", "nama_kantin", "nama_penjual", "no_telp", "saldo", "image_kantin", "image_penjual", "username", "password"];
    public $incrementing = false; //agar primary key dapat diisi char
}
