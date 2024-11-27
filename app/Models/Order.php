<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Payment;
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total_amount', 'shipping_method', 'payment_status'];

    // Quan hệ với bảng User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Quan hệ với bảng Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
