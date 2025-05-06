<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function dasboard()
    // {
    //     $stat = [
    //         'total_user' => User::where('role', 'user')->count(),
    //         'total_product' => Product::count(),
    //         'total_order' => Order::count(),
    //         'order' => Order::all(),
    //         'total_money' => Order::where('status', 'success')->sum('total_money'),
    //     ];
    //     $dataChart =

    //     $doanhThuTheoThang = DB::table('orders')
    //         ->selectRaw('YEAR(created_at) as Nam, MONTH(created_at) as Thang, SUM(total_money) as Tongtien')
    //         ->where('status', 'success')
    //         ->groupByRaw('YEAR(created_at), MONTH(created_at)')
    //         ->orderByRaw('YEAR(created_at) ASC, MONTH(created_at) ASC')
    //         ->get();

    //     $data = [
    //         'stat' => $stat,
    //         'dataChart' => $dataChart,
    //     ];
    //     return view('admin.dasboards', $data);
    // }
    public function dasboard()
{
    $stat = [
        'total_user' => User::where('role', 'user')->count(),
        'total_product' => Product::count(),
        'total_order' => Order::count(),
        'order' => Order::all(),
        'total_money' => Order::where('status', 'success')->sum('total_money'),

    ];
    $recentOrders = Order::with('user') // đảm bảo có quan hệ với bảng user
    ->orderBy('created_at', 'desc')
    ->limit(5)
    ->get();

    $dataChart = DB::table('orders')
        ->selectRaw('YEAR(created_at) as Nam, MONTH(created_at) as Thang, SUM(total_money) as Tongtien')
        ->where('status', 'success')
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
        ->limit(3)
        ->get()
        ->sortBy(function ($item) {
            return $item->Nam * 100 + $item->Thang;
        }) // sắp xếp lại tăng dần sau khi limit
        ->values();

    $labels = $dataChart->map(fn($d) => $d->Thang . '/' . $d->Nam);
    $values = $dataChart->map(fn($d) => $d->Tongtien);



    return view('admin.dasboards', [
        'stat' => $stat,
        'labels' => $labels,
        'values' => $values,
        'recentOrders' => $recentOrders,

    ]);

}
    public function getOrderDetails($id)
    {

        $data = [
            'neworder' => Order::table('orders')
            ->where('status', 'pending')
            ->count(),
        ];
        $d = [
            'data' => $data
        ];
        return view('template.admin', $d);
    }

}
