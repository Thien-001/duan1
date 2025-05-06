<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function show($slug){
    //     $product = Product::all();
    //     $data = [
    //         'product' => $product
    //     ];
    //     return view('product.detail', $data);
    // }
    public function detail($slug){
        $product = Product::where('slug', $slug)->first();
        $data = [
            "product" => $product
        ];
        return view('product.detail', $data);
    }
    public function allPro()
    {
        $productList = Product::all();

        $data = [
            'productList' => $productList
        ];
        return view('page.allPro', $data);
    }


}
