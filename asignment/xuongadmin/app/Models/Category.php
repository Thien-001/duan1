<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // App\Models\Category.php
    protected $table = 'categories'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = ['name', 'image','parent_id'];
    public $timestamps = false; // Nếu bạn dùng created_at, updated_at

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

