<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductResource extends Controller
{

    public function addform()
{
    // $products = Product::all();
    $categories = Category::all();
    return view('form.addpro', compact( 'categories'));
}

public function add(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug',
        'price' => 'required|numeric|min:0',
        'price_sale' => 'nullable|numeric|min:0|lt:price',
        'description' => 'required|string',
        'quantity' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);
        $imagePath = $filename;
    }

    Product::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'price' => $request->price,
        'price_sale' => $request->price_sale,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'category_id' => $request->category_id,
        'image' => $imagePath,
    ]);

    return redirect('/admin/product')->with('success', 'Thêm sản phẩm thành công!');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('form.updatepro', compact('product', 'categories'));
}
public function delete($id)
{
    $product = Product::findOrFail($id);

    // Xóa ảnh nếu có
    if ($product->image && File::exists(public_path('img/' . $product->image))) {
        File::delete(public_path('img/' . $product->image));
    }

    $product->delete();

    return redirect('/admin/product')->with('success', 'Xóa sản phẩm thành công!');
}

public function uppro(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug,' . $id,
        'price' => 'required|numeric|min:0',
        'price_sale' => 'nullable|numeric|min:0|lt:price',
        'description' => 'required|string',
        'quantity' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::findOrFail($id);

    // Xử lý ảnh mới nếu có
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($product->image && File::exists(public_path('img/' . $product->image))) {
            File::delete(public_path('img/' . $product->image));
        }

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);
        $product->image = $filename;
    }

    // Cập nhật dữ liệu
    $product->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'price' => $request->price,
        'price_sale' => $request->price_sale,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'category_id' => $request->category_id,
        'image' => $product->image,
    ]);

    return redirect('/admin/product')->with('success', 'Cập nhật sản phẩm thành công!');
}

public function index()
{
    $products = Product::with('category')->get();  // Sử dụng phương thức with để eager load category
    return response()->json([
        'success' => true,
        'message' => 'Lấy dữ liệu sản phẩm thành công',
        'data' => $products
    ]);
}

public function showProducts()
{
    $listpro = Product::all();
        $data = [
            'listpro' => $listpro,
        ];
        return view('product.adminpro', $data);
}


    // Thêm mới sản phẩm
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        if ($product->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Thêm sản phẩm thành công',
                'data' => $product
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Thêm sản phẩm thất bại'
        ], 422);
    }

    // Lấy chi tiết sản phẩm theo ID
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lấy sản phẩm thành công',
            'data' => $product
        ]);
    }

    // Cập nhật sản phẩm
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm'
            ], 404);
        }

        $product->name = $request->name ?? $product->name;
        $product->price = $request->price ?? $product->price;
        $product->category_id = $request->category_id ?? $product->category_id;
        $product->description = $request->description ?? $product->description;

        if ($product->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật sản phẩm thành công',
                'data' => $product
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cập nhật sản phẩm thất bại'
        ], 422);
    }

    // Xóa sản phẩm
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa sản phẩm thành công'
        ]);
    }
}
