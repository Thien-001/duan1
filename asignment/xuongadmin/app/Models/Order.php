<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable = [
        'user_id',
        'payment_method',
        'payment_status',

    ];
    public $timestamps = true; // Sử dụng timestamps (created_at, updated_at)
    public function orderDetails()
{
    return $this->hasMany(OrderDetail::class);
}

// Trong model Order.php
public function user()
{
    return $this->belongsTo(User::class);
}

}
