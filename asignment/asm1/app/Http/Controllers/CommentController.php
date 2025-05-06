<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Sanpham;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Comment::create([
            'id_sanpham' => $id,
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Bình luận đã được gửi!');
    }
}
