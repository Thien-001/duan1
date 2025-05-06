@extends('template.user')

@section('body')
<div class="container-form">
    <h2>Đăng nhập</h2>
    <form action="/postLogin" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Đăng nhập</button>
    </form>
    <p>Bạn chưa có tài khoản? <a href="/register">Đăng ký</a></p>
</div>
@endsection
