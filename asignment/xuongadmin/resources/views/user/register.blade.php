@extends('template.user')

@section('body')
<div class="container-form">
    <h2>Đăng ký</h2>
    <form action="/register" method="POST">
        @csrf
        <label for="name">Họ và tên:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>
        <label for="password">Nhập lại mật khẩu:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="/login">Đăng nhập</a></p>
</div>
@endsection
