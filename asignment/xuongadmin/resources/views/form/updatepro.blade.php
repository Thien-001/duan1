@extends('template.admin')
@section('bodyadmin')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Cập Nhật Sản Phẩm</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Sản Phẩm</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Cập Nhật Sản Phẩm</a>
                </li>
            </ul>
        </div>
        <a href="/admin/product" class="btn-download">
            <span class="text">Sản Phẩm</span>
        </a>
    </div>

<div class="container mt-4">

    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.update', $product->id) }}">
        @csrf
        @method('POST') <!-- Giữ nguyên nếu controller dùng POST, hoặc dùng PATCH nếu cần -->

        <div class="form-group mb-2">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mb-2">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ $product->slug }}" required>
        </div>

        <div class="form-group mb-2">
            <label for="price">Giá</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group mb-2">
            <label for="price_sale">Giá KM (nếu có)</label>
            <input type="number" class="form-control" name="price_sale" value="{{ $product->price_sale }}">
        </div>

        <div class="form-group mb-2">
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}" required>
        </div>

        <div class="form-group mb-2">
            <label for="quantity">Số lượng</label>
            <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" required>
        </div>

        <div class="form-group mb-2">
            <label for="category_id">Danh mục</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="image">Ảnh sản phẩm</label>
            <input type="file" class="form-control" name="image">
            @if($product->image)
                <div class="mt-2">
                    <img src="{{ asset('img/' . $product->image) }}" width="120">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-addupdate">Cập nhật</button>
    </form>
</div>
</main>
@endsection
