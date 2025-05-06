<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Database\Seeders\loaiSeeder;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham'; 
    protected $fillable = [
        'ten',
        'slug',
        'anh',
        'gia',
        'giaKM',
        'moTa',
        'danhgia',
        'soluong',
        'id_loai', 

    ];


    public function loai()
    {
        return $this->belongsTo(Loai::class, 'id_loai');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_sanpham');
    }
}
