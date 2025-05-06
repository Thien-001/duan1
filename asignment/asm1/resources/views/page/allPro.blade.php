@extends('template.user')
@section('body')
<title>Sản phẩm</title>
<!-- Thanh đường dẫn -->
<nav class="breadcrumb">
    <a href="/">Trang chủ</a> &gt; <span class="current-product">Tất cả sản phẩm</span>
</nav>
<!-- Tất cả các sản phẩm -->
<section class="products">
    <h2>Sản phẩm mới</h2>
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->anh}}" alt="">
            </a>
            <h3>{{ $product->ten }}</h3>
            <p>Thương hiệu: {{ $product->loai->tenLoai }}</p>
            

            <span class="price">{{ number_format($product->gia) }}đ</span>

            <!-- <span class="price">{{ number_format($product->giaKM) }}đ</span> -->
            
            <form action="/cart" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="ten" value="{{ $product->ten }}">
            <input type="hidden" name="gia" value="{{ $product->gia }}">
            <input type="hidden" name="anh" value="{{ $product->anh }}">
            <input type="hidden" id="soluong" name="soluong" value="1" min="1" max="{{ $product->soluong }}">
            <button type="submit" class="buy-btn">Thêm vào giỏ hàng</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
</section>


<!-- Footer -->
<footer class="footer">
    <p>© 2025 ShopOnline. All rights reserved.</p>
  </footer>
@endsection