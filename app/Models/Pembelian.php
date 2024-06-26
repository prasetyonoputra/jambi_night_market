<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = "pembelian";

    protected $fillable = ['nama_product', 'id_pembeli', 'tanggal_pembelian', 'jumlah', 'total_harga', 'status', 'id_product'];
}
