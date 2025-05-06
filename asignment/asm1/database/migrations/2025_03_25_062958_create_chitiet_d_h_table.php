<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chitiet_donhang', function (Blueprint $table) {
            $table->foreignId('maDH')->references('id')->on('donhang');
            $table->foreignId('maSP')->references('id')->on('sanpham');
            $table->primary(['maDH','maSP']);
            $table->integer('gia');
            $table->integer('soluong')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitiet_donhang');
    }
};
