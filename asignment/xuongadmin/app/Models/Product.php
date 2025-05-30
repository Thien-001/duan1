<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 
    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'sale_price',
        'description',
        'rating',
        'quantity',
        'category_id', 

    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
