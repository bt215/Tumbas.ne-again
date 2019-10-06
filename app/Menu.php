<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = "id_menu";
    protected $fillable = ["id_menu", "id_kantin", "nama_menu", "deskripsi", "harga", "image"];
    public $incrementing = false; //agar primary key dapat diisi char

}
