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
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('slug')->unique();
            $table->string('anh');
            $table->integer('gia')->default(0);
            $table->integer('giaKM')->nullable();
            $table->text('moTa')->nullable();
            $table->double('danhgia')->default(0);
            $table->integer('soluong')->default(1);
            $table->foreignId('id_loai')->references('id')->on('loais');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
