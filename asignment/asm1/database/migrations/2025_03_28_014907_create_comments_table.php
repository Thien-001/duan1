<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
        {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_sanpham')->nullable()->references('id')->on('sanpham');
                $table->string('name'); // Tên người bình luận
                $table->text('content'); // Nội dung bình luận
                $table->timestamps();

                
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
