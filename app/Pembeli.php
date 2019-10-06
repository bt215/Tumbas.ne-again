<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = "pembeli";
    protected $primaryKey = "id_pembeli";
    protected $fillable = ["id_pembeli", "nama", "kelas", "email","no_telp", "saldo", "image", "username", "password"];
    public $incrementing = false; //agar primary key dapat diisi char
}
