<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id_admin";
    protected $fillable = ["id_karyawan", "nama", "email", "no_telp", "username", "password, image"];
    public $incrementing = false; //agar primary key dapat diisi char
}
