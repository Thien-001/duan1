@extends('template.admin')

@section('bodyadmin')
    {{-- <div id="content"> --}}
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Chi tiết đơn hàng</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/admin/order">Đơn hàng</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Chi tiết đơn hàng</a>
                        </li>
                    </ul>
                </div>
                <a href="/admin/order" class="btn-download">
                    <span class="text">Đơn hàng</span>
                </a>
            </div>
            <div class="mt-4 order-details-wrapper">
                <h1>Chi tiết đơn hàng #{{ $order->id }}</h1>

                <div class="order-info-group">
                    <label>Người dùng:</label>
                    <input type="text" value="{{ $order->user_id }}" disabled>
                </div>
                <div class="order-info-group">
                    <label>Phương thức thanh toán:</label>
                    <input type="text" value="{{ $order->payment_method }}" disabled>
                </div>
                <div class="order-info-group">
                    <label>Trạng thái:</label>
                    <input type="text" value="{{ $order->status }}" disabled>
                </div>
                <div class="order-info-group">
                    <label>Ngày đặt hàng:</label>
                    <input type="text" value="{{ $order->created_at }}" disabled>
                </div>

                <h3 class="product-table-title">Sản phẩm trong đơn hàng</h3>
                <div class="order-product-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $detail)
                                <tr>
                                    <td>{{ $detail->product->name }}</td>
                                    <td>{{ number_format($detail->price) }}đ</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ number_format($detail->price * $detail->quantity) }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    {{-- </div> --}}


@endsection
