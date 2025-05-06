@extends('template.admin')
@section('bodyadmin')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Cập Nhật Danh Mục</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Danh Mục</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Cập Nhật Danh Mục</a>
                </li>
            </ul>
        </div>
        <a href="/admin/category" class="btn-download">
            <span class="text">Danh Mục</span>
        </a>
    </div>

<div class="container mt-4">
    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        @method('POST') {{-- hoặc PUT nếu bạn dùng route PUT --}}

        <div class="form-group mb-2">
            <label for="category-code">Mã danh mục cha</label>
            <input type="text" class="form-control" name="parent_id" value="{{ $category->parent_id }}">

        </div>

        <div class="form-group mb-2">
            <label for="category-name">Tên danh mục</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Ảnh hiện tại:</label><br>
            @if($category->image)
                <img src="{{ asset('') }}img/{{$category->image}}" width="100" alt="Ảnh danh mục"><br>
            @else
                <em>Không có ảnh</em><br>
            @endif
        </div>

        <div class="form-group mb-2">
            <label for="category-image">Chọn ảnh mới (nếu muốn thay)</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-success btn-addupdate">Cập nhật</button>
    </form>
</div>
</main>
@endsection
