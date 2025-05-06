<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MEGA - WATCH</title>
  <link rel="stylesheet" href="{{ asset('') }}css/style.css">
  <link rel="stylesheet" href="{{ asset('') }}css/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>
<body>
  <div class="container">
  <!-- Header -->
  <header class="header">

      <img src="{{ asset('') }}img/logonew.png" alt="">
      <nav class="nav">
        <a href="/">Trang chủ</a>
        <a href="/product">Sản phẩm</a>
        <a href="/about">Giới thiệu</a>
        <a href="/contact">Liên hệ</a>
        @auth
        <a href="/">Chào {{ Auth::user()->name }}</a>
            <a href="/logout">Đăng xuất</a>
        @else
            <a href="/login">Đăng nhập</a>
        @endauth

        <a href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>
      </nav>
  </header>
</div>
<hr>

@yield('body')



</body>
</html>
