@extends('template.admin')

@section('bodyadmin')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Danh Sách Đơn Hàng</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Đơn Hàng</a>
                </li>
            </ul>
        </div>
    </div>

    @if (session('success'))
    <div class="custom-success mt-3">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    <main class="main-table container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>STT</th> --}}
                    <th>Mã ĐH</th>
                    <th>Người Dùng</th>
                    <th>PT.Thanh Toán</th>
                    <th>Trạng Thái</th>

                    <th>Tổng Tiền</th>
                    <th>Ngày Tạo</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'Không rõ' }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ</option>
                                    <option value="shipping" {{ $order->status == 'shipping' ? 'selected' : '' }}>Đang giao</option>
                                    <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Hoàn thành</option>
                                    <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>Hủy</option>
                                </select>
                            </form>
                        </td>
                        <td>{{ number_format($order->total_money) }}đ</td>
                        <td>{{ $order->created_at}}</td>
                        {{-- <td>{{ $order->updated_at}}</td> --}}
                        <td>
                            <a href="{{ route('detailorder', $order->id) }}" class="btn btn-primary btn-sm">Chi tiết</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</main>
@endsection
