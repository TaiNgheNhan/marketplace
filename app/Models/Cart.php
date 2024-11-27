<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CartItem;
class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    // Quan hệ với bảng CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Quan hệ với bảng User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
