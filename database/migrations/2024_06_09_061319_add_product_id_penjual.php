<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('id_penjual');
        });
    }
    
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('id_penjual');
        });
    }
};
