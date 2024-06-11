<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('nama_product');
            $table->string('id_pembeli');
            $table->dateTime('tanggal_pembelian');
            $table->integer('jumlah');
            $table->decimal('total_harga', 18, 2);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
