<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\ProductSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Models\Product;
class PageController extends Controller
{
    public function home(){
        $productList = Product::all();
        $proid = [];
        $data = [
            'productList' => $productList,
            'proid' => $proid
        ];

        return view('page.home', $data);
    }
    



}
