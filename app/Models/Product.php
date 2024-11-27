<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\ProductLike;
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'name', 'description', 'price', 'quantity', 'status'];

    // Quan hệ với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ với bảng User (Người bán)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với bảng ProductImage
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Quan hệ với bảng Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Quan hệ với bảng ProductLike
    public function likes()
    {
        return $this->hasMany(ProductLike::class);
    }
}
