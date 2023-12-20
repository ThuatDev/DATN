<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product_detail()
    {
        return $this->belongsTo('App\Models\ProductDetail');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_detail_id');
    }

    public function order_details_through_product()
    {
        return $this->hasManyThrough(OrderDetail::class, Product::class);
    }

    public function related_order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_detail_id');
    }

    // Trong class Order
    public function all_order_details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
