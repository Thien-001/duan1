@extends('template.admin')
@section('bodyadmin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Danh Sách Danh Mục</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Danh Mục</a>
                </li>
            </ul>
        </div>
        <a href="/admin/category/add" class="btn-download">
            <span class="text">Thêm danh mục</span>
        </a>
    </div>
    <main class="main-table container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th>Ảnh</th>
                    <th>Mã danh mục</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listcate as $cate)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>
                            <img src="/img/{{ $cate->image }}" alt="" width="50" height="50">
                        </td>
                        <td>{{ $cate->parent_id }}</td>
                        <td>
                            <button class="btn btn-info btn-sm"><a href="{{ route('admin.category.edit', $cate->id) }}"
                                 class="btn btn-warning btn-sm">
                                Sửa
                            </a>
                            </button>
                            <button class="btn btn-danger btn-sm"><a href="{{ route('admin.category.delete', $cate->id) }}"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                class="btn btn-danger btn-sm">
                                Xóa
                             </a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </main>



@endsection
