@extends('template.admin')
@section('bodyadmin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Danh Sách Sản Phẩm</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Danh Sách Sản Phẩm</a>
                </li>
            </ul>
        </div>
        <a href="/admin/product/add" class="btn-download">
            <span class="text">Thêm Sản Phẩm</span>
        </a>
    </div>



<main class="main-table container mt-5">
    {{-- <h2>Danh Sách Sản Phẩm</h2> --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Danh Mục</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listpro as $pro)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pro->name }}</td>

                    <td><img src="/img/{{ $pro->image }}" alt="{{ $pro->image }}" width="50" height="50"></td>
                    <td>{{ number_format($pro->price) }}đ</td>
                    <td>{{ $pro->category_id }}</td>
                    <td>
                        <button class="btn btn-info btn-sm"><a href="{{ route('admin.product.edit', $pro->id) }}"
                            class="btn btn-warning btn-sm">Sửa</a></button>
                        <button class="btn btn-danger btn-sm"><a href="{{ route('admin.product.delete', $pro->id) }}"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                            class="btn btn-danger btn-sm">Xóa</a></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>


</main>
@endsection
