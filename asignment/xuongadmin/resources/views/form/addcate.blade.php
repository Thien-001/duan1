@extends('template.admin')
@section('bodyadmin')
<main>
<div class="head-title">
    <div class="left">
        <h1>Thêm Danh Mục</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Danh Mục</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Thêm Danh Mục</a>
            </li>
        </ul>
    </div>
    <a href="/admin/category" class="btn-download">
        <span class="text">Danh Mục</span>
    </a>
</div>

<div class="container mt-4">
    {{-- <h1>Thêm Danh Mục</h1> --}}
    <form id="add-category-form" enctype="multipart/form-data" method="POST" action="{{route('category.add')}}">
        @csrf
        <div class="form-group mb-2">
            <label for="category-code">Mã danh mục</label>
            <input type="text" class="form-control" id="category-code" name="parent_id" placeholder="Nhập mã danh mục" required>
        </div>

        <div class="form-group mb-2">
            <label for="category-name">Tên danh mục</label>
            <input type="text" class="form-control" id="category-name" name="name" placeholder="Nhập tên danh mục" required>
        </div>

        <div class="form-group mb-2">
            <label for="category-image">Ảnh danh mục</label>
            <input type="file" class="form-control" id="category-image" name="image">
        </div>

        <button type="submit" class="btn btn-primary btn-download" >Thêm</button>
    </form>
</div>
</main>
@endsection
