@extends('template.user')
@section('body')
<title>{{ $product->ten }}</title>
<!-- Thanh đường dẫn -->
<nav class="breadcrumb">
    <a href="/">Trang chủ</a>&gt; <a href="/product">Sản phẩm</a> &gt; <span class="current-product">{{ $product->ten }}</span>
</nav>
<section class="product-detail">
    <!-- Chi tiết sản phẩm -->

    <div class="product-container">
        <!-- Hình ảnh bên trái -->
        <div class="product-image">
            <img src="{{ asset('') }}img/{{$product->image}}" alt="">
        </div>

        <!-- Thông tin chi tiết bên phải -->
        <div class="product-info">
        <form action="/cart" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ $product->image }}">
            <h1 class="product-name">{{ $product->ten }}</h1>
            <p><strong>Thương hiệu: </strong> {{ $product->category->name }}</p>
            <p class="description"><strong>Mô tả:</strong> {{ $product->description }}</p>
            <!-- Hàng chứa Giá & Số lượng -->
            <div class="price-quantity">
                <p class="price">Giá: {{ number_format($product->price) }}đ</p>
                <div class="quantity-selector">
                    <label for="soluong">Số lượng:</label>
                    <input type="number" id="soluong" name="quantity" value="1" min="1" max="{{ $product->quantity }}">
                </div>
            </div>
            <button type="submit" class="buy-btn">Thêm vào giỏ hàng</button>
            </form>
        </div>

    </div>

</section>
<!-- Hiển thị bình luận -->
{{-- <section class="container-comment">
<h3>Tất cả bình luận</h3>
@if($product->comments->count() > 0)
    @foreach ($product->comments as $comment)
        <div class="comment">
            <p><strong>{{ $comment->name }}</strong>:</p>
            <p>{{ $comment->content }}</p>
            <hr>
        </div>
    @endforeach
@else
    <p>Chưa có bình luận nào.</p>
@endif

<h3>Bình luận</h3>
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('product.comment', ['id' => $product->id]) }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Tên của bạn" required><br>
    <textarea name="content" placeholder="Viết bình luận..." required></textarea><br>
    <button type="submit">Gửi bình luận</button>
</form>
</section> --}}




<!-- sản phẩm liên quan -->
<section class="products">
    <h2>Sản phẩm khác</h2>

    <div class="product-list">
        <div class="product">
            <a href="product/1">
                <img src="{{ asset('') }}img/sp3.webp" alt="Product 1">
            </a>
            <h3>Maserati Skeleton Black Leather</h3>
            <p>Thương hiệu: Maserati</p>
            <p class="price">Giá: <span class="price">10,000,000đ</span></p>
            <a href="product/1">
                <button>Thêm vào giỏ hàng</button>
            </a>
        </div>
        <div class="product">
            <a href="product/1">
                <img src="{{ asset('') }}img/sp6.jpg" alt="Product 1">
            </a>
            <h3>Classic Petite Unitone Rose Gold</h3>
            <p>Thương hiệu: Casio</p>
            <p class="price">Giá: <span class="price">5,300,000đ</span></p>
            <a href="product/1">
                <button>Thêm vào giỏ hàng</button>
            </a>
        </div>
        <div class="product">
            <a href="product/1">
                <img src="{{ asset('') }}img/sp9.jpg" alt="Product 1">
            </a>
            <h3>Đồng hồ Hanboro HBR-1008 Automatic</h3>
            <p>Thương hiệu: Hanboro</p>
            <p class="price">Giá: <span class="price">3,000,000đ</span></p>
            <a href="product/1">
                <button>Thêm vào giỏ hàng</button>
            </a>
        </div>

    </div>
</div>
</section>


<!-- Footer -->
<footer class="footer">
    <p>© 2025 ShopOnline. All rights reserved.</p>
  </footer>

@endsection
