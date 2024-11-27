<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Order;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Review;
use App\Models\ProductLike;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'phone', 'address', 'role'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Quan hệ với bảng Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Quan hệ với bảng Messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Quan hệ với bảng Notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // Quan hệ với bảng Reviews (Nếu có)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Quan hệ với bảng ProductLikes (Nếu có)
    public function productLikes()
    {
        return $this->hasMany(ProductLike::class);
    }
}
