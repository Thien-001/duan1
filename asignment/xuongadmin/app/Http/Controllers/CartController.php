<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $cart = Session::get('cart', []);
    // dd($cart); // Kiểm tra session giỏ hàng

    return view("cart.index", compact('cart'));
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Lấy giỏ hàng từ session hoặc tạo giỏ hàng rỗng nếu chưa có
    $cart = Session::get('cart', []);

    $foundIndex = null;

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
    foreach ($cart as $index => $item) {
        if ($item['id'] == $request->id) {
            $foundIndex = $index;
            break;
        }
    }

    if ($foundIndex !== null) {
        // Nếu sản phẩm đã có, cập nhật số lượng
        $cart[$foundIndex]['quantity'] += (int) $request->quantity;
    } else {
        // Nếu chưa có, thêm sản phẩm mới
        $cart[] = [
           'id' => $request->id,
        'name' => $request->name,
        'price' => (int) $request->price,
        'image' => $request->image ?? 'default.png', // Gán hình mặc định nếu không có
        'quantity' => (int) $request->quantity,
        ];
    }

    // Cập nhật lại session
    Session::flush();


    Session::put('cart', $cart);

    return redirect('/cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
}





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $cart = Session::get('cart', []);

    foreach ($cart as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] = $request->quantity; // Cập nhật số lượng mới
            break;
        }
    }

    // Cập nhật lại session
    Session::put('cart', $cart);

    return redirect('/cart')->with('success');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $cart = Session::get('cart', []);

    // Tìm và xóa sản phẩm theo ID
    foreach ($cart as $key => $item) {
        if ($item['id'] == $id) {
            unset($cart[$key]);
            break;
        }
    }

    // Cập nhật lại session
    Session::put('cart', array_values($cart));

    return redirect('/cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
}

}
