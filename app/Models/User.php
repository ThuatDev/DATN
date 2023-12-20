<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
      public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function hasPurchased($product_id)
    {
        // Kiểm tra xem người dùng có đơn hàng nào chứa sản phẩm này hay không
        return $this->orders->pluck('orderDetails.*.product_id')->flatten()->contains($product_id);
    }

    public function canReviewProduct($product_id)
    {
        // Kiểm tra xem người dùng đã mua sản phẩm để có thể đánh giá hay không
        return $this->hasPurchased($product_id);
    }
}
