<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Illuminate\Http\Request;

class SanphamController extends Controller
{
    public function allPro()
    {
        $productList = Sanpham::all();
        
        $data = [
            'productList' => $productList
        ];
        return view('page.allPro', $data);
    }
    public function detail($slug){
        $product = Sanpham::where('slug', $slug)->first();

        $data = [
            "product" => $product
        ];
        return view('product.detail', $data);
    }
   
    

}
