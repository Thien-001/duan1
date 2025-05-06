<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Trả về view quản lý danh mục
    public function showCategories()
    {
        $listcate = Category::all();
        $data = [
            'listcate' => $listcate,
        ];
        return view('admin.category', $data);
        // return view('admin.category'); // view này bạn tạo tương tự product.adminpro
    }

    // Lấy danh sách danh mục (API)
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'message' => 'Lấy danh sách danh mục thành công',
            'data' => $categories,
            view('admin.category', $categories)
        ]);

    }

    // Thêm danh mục mới (API)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($category->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Thêm danh mục thành công',
                'data' => $category
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Thêm danh mục thất bại'
        ], 422);
    }



    // Lấy chi tiết danh mục
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy danh mục'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lấy danh mục thành công',
            'data' => $category
        ]);
    }

    // Cập nhật danh mục
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy danh mục'
            ], 404);
        }

        $category->name = $request->name ?? $category->name;

        if ($category->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật danh mục thành công',
                'data' => $category
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cập nhật danh mục thất bại'
        ], 422);
    }

    // Xoá danh mục
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy danh mục'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xoá danh mục thành công'
        ]);
    }
    public function addform()
    {
        return view('form.addcate');
    }
    public function add(Request $request)
{
    // Validate dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'parent_id' => 'required|string|max:255',
    ]);

    // Xử lý file ảnh nếu có
    if ($request->image) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename); // Lưu vào thư mục public/img
        $imagePath = $filename; // Lưu đường dẫn tương đối
    } else {
        $imagePath = null;
    }

    // Lưu dữ liệu vào database
    Category::create([
        'name' => $request->input('name'),
        'image' => $imagePath, // Lưu đường dẫn ảnh
        'parent_id' => $request->input('parent_id'),
    ]);

    return redirect('/admin/category')->with('success', 'Thêm danh mục thành công!');
}
        public function delete($id)
    {
        $category = Category::findOrFail($id);

        // Xóa ảnh nếu có
        if ($category->image && File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }

        // Xóa danh mục
        $category->delete();

        return redirect('/admin/category')->with('success', 'Xóa danh mục thành công!');
    }
        public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get(); // Để chọn danh mục cha nếu cần
        return view('form.updatecate', compact('category', 'categories'));
    }
    public function upcate(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'parent_id' => 'nullable|exists:categories,id',
    ]);

    $category = Category::findOrFail($id);

    // Xử lý ảnh mới nếu có
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($category->image && File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);
        $imagePath = $filename;
    } else {
        $imagePath = $category->image;
    }

    // Cập nhật dữ liệu
    $category->update([
        'name' => $request->input('name'),
        'parent_id' => $request->input('parent_id') ?: null,
        'image' => $imagePath,
    ]);

    return redirect('/admin/category')->with('success', 'Cập nhật danh mục thành công!');
}
}
