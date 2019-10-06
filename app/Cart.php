<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "pesan";
    protected $primaryKey = "id_pesan";
    protected $fillable = ["id_pesan",  "id_pembeli", "tanggal_beli"];
    public $incrementing = false; //agar primary key dapat diisi char

    public function admin()
    {
        return $this->belongsTo("App\Admin", "id_admin");
    }
    
}
