<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    // Quan hệ với bảng Order (nếu cần)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
