<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function payment_method() {
    return $this->belongsTo('App\Models\PaymentMethod');
  }
  public function order_details() {
    return $this->hasMany('App\Models\OrderDetail');
  }
  public function all_order_details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
