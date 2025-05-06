@extends('template.admin')
@section('bodyadmin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Thêm Sản Phẩm</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Sản Phẩm</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Thêm Sản Phẩm</a>
                </li>
            </ul>
        </div>
        <a href="/admin/product" class="btn-download">
            <span class="text">Sản Phẩm</span>
        </a>
    </div>

<div class="container mt-4">

    <form id="add-category-form" enctype="multipart/form-data" method="POST" action="{{route('product.add')}}">
        @csrf
        <div class="form-group mb-2">
            <label for="product-name">Tên</label>
            <input type="text" class="form-control"  name="name" placeholder="Nhập mã danh mục" required>
        </div>

        <div class="form-group mb-2">
            <label for="product-slug">slug</label>
            <input type="text" class="form-control"  name="slug" placeholder="Nhập mã danh mục" required>
        </div>

        <div class="form-group mb-2">
            <label for="category-code">Giá</label>
            <input type="text" class="form-control"  name="price" placeholder="Nhập mã danh mục" required>
        </div>

        <div class="form-group mb-2">
            <label for="category-code">Giá KM (nếu có)</label>
            <input type="text" class="form-control"  name="price_sale" placeholder="Nhập mã danh mục">
        </div>

        <div class="form-group mb-2">
            <label for="category-name">Mô tả</label>
            <input type="text" class="form-control" name="description" placeholder="Nhập tên danh mục" required>
        </div>
        <div class="form-group mb-2">
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="category-image">Ảnh danh mục</label>
            <input type="file" class="form-control"  name="image">
        </div>

        <button type="submit" class="btn btn-primary btn-download">Thêm</button>
    </form>
</div>
</main>
@endsection
