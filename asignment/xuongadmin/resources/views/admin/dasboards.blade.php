@extends('template.admin')
@section('bodyadmin')
<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Download PDF</span>
        </a>
    </div>



    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{ $stat['total_order'] }}</h3>
                <p>Đơn Hàng</p>
            </span>
        </li>

        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>{{ $stat['total_user'] }}</h3>
                <p>Người Dùng</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>{{ number_format($stat['total_money']) }}đ</h3>
                <p>Tổng Doanh Số</p>
            </span>
        </li>
        <li>
            <i class='bx bxl-product-hunt' ></i>
            <span class="text">
                <h3>{{ $stat['total_product'] }}</h3>
                <p>Sản Phẩm</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Người Dùng</th>
                        <th>Mã ĐH</th>
                        <th>Ngày Tạo</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentOrders as $order)
                        <tr>
                            <td>
                                <img src="{{ asset('img/people.png') }}">
                                <p>{{ $order->user->name?? 'N/A' }}</p>
                            </td>
                            <td><p>{{ $order->id?? 'N/A' }}</p></td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td>
                                @php
                                    $statusClass = match($order->status) {
                                        'success' => 'completed',
                                        'pending' => 'pending',
                                        'shipping' => 'process',
                                        'cancel' => 'cancel',
                                        default => '',
                                    };
                                @endphp
                                <span class="status {{ $statusClass }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="todo">
            <canvas id="revenueChart" width="600" height="600"></canvas>

            <script>
                const ctx = document.getElementById('revenueChart').getContext('2d');

                const revenueChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($labels) !!}, // ['2/2025', '3/2025', '4/2025']
                        datasets: [{
                            label: 'Doanh thu (VND)',
                            data: {!! json_encode($values) !!}, // [15000000, 18000000, 22000000]
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('vi-VN');
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
        </div>

    </div>





</main>
<!-- MAIN -->

@endsection
