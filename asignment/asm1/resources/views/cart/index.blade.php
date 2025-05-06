@extends('template.user')

@section('body')
<div class="cart-container">
    <h2>Giỏ hàng của bạn</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="cart-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @foreach ($cart as $item)
            <tr>
                <td>{{ $stt++ }}</td>
                <td><img src="{{ asset('') }}img/{{ $item['anh'] }}" alt=""></td>
                <td>{{ $item['ten'] }}</td>
                <td>{{ number_format($item['gia']) }}đ</td>
                <td>
                  <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                      @csrf
                      <input type="number" name="soluong" value="{{ $item['soluong'] }}" min="1" 
                            onchange="this.form.submit()">
                  </form>
                </td>
    <td>{{ number_format($item['gia'] * $item['soluong']) }}đ</td>
                <td><a href="{{ route('cart.remove', $item['id']) }}" class="remove-btn" 
       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
        Xóa   
    </a></td>
            </tr>
            @endforeach
            @php 
                $total = collect($cart)->sum(fn($item) => $item['gia'] * $item['soluong']); 
            @endphp

        </tbody>
    </table>
    <div class="cart-total">
            <p><strong>Tổng cộng:</strong> {{ number_format($total) }}đ</p>

        <form action="/vnpay_php/vnpay_create_payment" id="frmCreateOrder" method="post">        
            @csrf    
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control" 
                    data-val="true" 
                    data-val-number="The field Amount must be a number." 
                    data-val-required="The Amount field is required." 
                    id="amount" 
                    max="100000000" 
                    min="1" 
                    name="amount" 
                    type="number" 
                    value="{{ $total }}" 
                    readonly />
            </div>

                     <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group">
                        <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                       
                       <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                       <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                       <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                      abel for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
                       
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                         
                    </div>
                    <button type="submit" class="btn btn-default" href>Thanh toán</button>
                </form>
                <!-- {{ $total = number_format(collect($cart)->sum(fn($item) => $item['gia'] * $item['soluong']))}}
            {{ number_format(collect($cart)->sum(fn($item) => $item['gia'] * $item['soluong'])) }}₫ -->
        </p>
        <!-- <button class="checkout-btn"><a href="" checkout-btn>Thanh toán</a></button> -->
    </div>
</div>


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
@endsection
