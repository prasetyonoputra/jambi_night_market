<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama_product', 'deskripsi_produk', 'kategori_product', "harga", "id_penjual"];
}
