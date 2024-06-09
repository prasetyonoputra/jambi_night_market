<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pembelian', function (Blueprint $table) {
            $table->string('id_product');
        });
    }
    
    public function down(): void
    {
        Schema::table('pembelian', function (Blueprint $table) {
            $table->string('id_product');
        });
    }
};
