<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = "umkm";

    protected $fillable = ['nama_umkm', 'pemilik', 'alamat', 'email', 'no_telp', 'deskripsi', 'status'];
}
