<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sanpham;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách tất cả sản phẩm
        $sanphams = Sanpham::all();

        foreach ($sanphams as $sanpham) {
            Comment::create([
                'id_sanpham' => $sanpham->id,  // Đảm bảo tên cột đúng
                'name' => 'Người dùng ' . $sanpham->id,
                'content' => 'Sản phẩm này rất tuyệt vời! Tôi rất thích nó.',
            ]);
        }
    }
}
