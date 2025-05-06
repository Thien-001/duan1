@extends('template.user')
@section('body')
<div class="banner">
    <img src="{{ asset('') }}img/banner2.png" alt="">
</div>
<!-- Sản phẩm mới -->
<section class="products">
    <h2>Sản phẩm mới</h2>
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->image}}" alt="">
            </a>
            <h3>{{ $product->name }}</h3>
            <p>Thương hiệu: {{ $product->category->name }}</p>


            <span class="price">{{ number_format($product->price) }}đ</span>

            <!-- <span class="price">{{ number_format($product->sale_price) }}đ</span> -->

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
<img src="{{ asset('') }}img/bannner2.jpg" alt="" width="100%">
</section>
<!-- Các sản phẩm hot -->
<section class="products">

    <h2>Sản phẩm mới</h2>
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->image}}" alt="">
            </a>
            <h3>{{ $product->name }}</h3>
            <p>Thương hiệu: {{ $product->category->name }}</p>


            <span class="price">{{ number_format($product->price) }}đ</span>

            <!-- <span class="price">{{ number_format($product->sale_price) }}đ</span> -->

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
<img src="{{ asset('') }}img/banner1.jpg" alt="" width="100%">
</section>
<section class="products">

    <h2>Sản phẩm mới</h2>
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->image}}" alt="">
            </a>
            <h3>{{ $product->name }}</h3>
            <p>Thương hiệu: {{ $product->category->name }}</p>


            <span class="price">{{ number_format($product->price) }}đ</span>

            <!-- <span class="price">{{ number_format($product->sale_price) }}đ</span> -->

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
<img src="{{ asset('') }}img/banner3.jpg" alt="" width="100%">
</section>
<section class="products">

    <h2>Sản phẩm mới</h2>
    <div class="product-list">
        @foreach ($productList as $product)
        <div class="product">
            <a href="/detail/{{ $product->slug }}">
                <img src="{{ asset('') }}img/{{$product->image}}" alt="">
            </a>
            <h3>{{ $product->name }}</h3>
            <p>Thương hiệu: {{ $product->category->name }}</p>


            <span class="price">{{ number_format($product->price) }}đ</span>

            <!-- <span class="price">{{ number_format($product->sale_price) }}đ</span> -->

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
