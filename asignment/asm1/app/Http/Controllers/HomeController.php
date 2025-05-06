<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use Database\Seeders\sanphamSeeder;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home()
    {
        $productList = Sanpham::all();
        $data = [
            'productList' => $productList
        ];
        return view('page.home', $data); 
    }
}
