@extends('template.user')
@section('body')
<title>Sản phẩm</title>
<!-- Thanh đường dẫn -->
<nav class="breadcrumb">
    <a href="/">Trang chủ</a> &gt; <span class="current-product">Tất cả sản phẩm</span>
</nav>
<!-- Tất cả các sản phẩm -->
<section class="products">
    <h2>Tất cả sản phẩm</h2>
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->image}}" alt="">
            </a>
            <h3>{{ $product->name }}</h3>
            <p>Thương hiệu: {{ $product->category->name }}</p>


            <span class="price">{{ number_format($product->price) }}đ</span>

            <!-- <span class="price">{{ number_format($product->price_sale) }}đ</span> -->

            <form action="/cart" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ $product->image }}">
            <input type="hidden" id="soluong" name="quantity" value="1" min="1" max="{{ $product->quantity }}">
            <button type="submit" class="buy-btn">Thêm vào giỏ hàng</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
</section>
<section class="products">
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->image}}" alt="">
            </a>
            <h3>{{ $product->name }}</h3>
            <p>Thương hiệu: {{ $product->category->name }}</p>


            <span class="price">{{ number_format($product->price) }}đ</span>

            <!-- <span class="price">{{ number_format($product->price_sale) }}đ</span> -->

            <form action="/cart" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ $product->image }}">
            <input type="hidden" id="soluong" name="quantity" value="1" min="1" max="{{ $product->quantity }}">
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
