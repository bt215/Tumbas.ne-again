<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Cart extends Model
{
    protected $table = "detail_pesan";
    protected $primaryKey = "id_pesan";
    protected $fillable = ["id_pesan", "id_kantin", "id_pembeli", "id_menu", "jumlah", "harga", "pesan_teks"];

    public function pembeli()
    {
        return $this->belongsTo("App\Pembeli", "id_pembeli");
    }

    public function detail_cart()
    {
        return $this->belongsTo("App\Detail_Cart", 'id_pesan', 'id_pesan');
    }

    public function kantin()
    {
    	return $this->belongsTo("App\Kantin", "id_kantin");
    }

    public function menu()
    {
        return $this->belongsTo("App\Menu", "id_menu");
    }
}
