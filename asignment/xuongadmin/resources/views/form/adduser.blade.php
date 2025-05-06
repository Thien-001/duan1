@extends('template.admin')

@section('bodyadmin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Thêm Người Dùng</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Người Dùng</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Thêm Người Dùng</a>
                </li>
            </ul>
        </div>
        <a href="/admin/user" class="btn-download">
            <span class="text">Người Dùng</span>
        </a>
    </div>

<div class="container mt-4">

<form action="{{route('user.add')}}" method="POST">
    @csrf
    <div class="form-group mb-2">
        <label for="name">Tên</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="role">Role</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="khách hàng">Khách hàng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success btn-download">Thêm</button>
</form>
</div>
</main>
@endsection
