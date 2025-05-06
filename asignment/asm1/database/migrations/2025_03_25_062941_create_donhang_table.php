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
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTK')->references('id')->on('users');
            $table->enum('phuongthucTT', ['COD', 'Banking','Wallet', 'Card'])
            ->default('COD');
            $table->enum('trangthaiTT', ['pending','done'])->default('pending');
            $table->enum('trangthai', ['Chờ xác nhận','Đang vận chuyển','Giao thành công','Hủy đơn hàng'])
            ->default('Chờ xác nhận');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
