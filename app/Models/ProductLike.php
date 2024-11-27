<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
class ProductLike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    // Quan hệ với bảng Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Quan hệ với bảng User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
