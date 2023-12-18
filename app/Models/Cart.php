<?php

namespace App\Models;

use App\Models\ProductDetail;
use Illuminate\Support\Arr;

class Cart
{
  public $items = NULL;
  public $totalQty = 0;
  public $totalPrice = 0;

  public function __construct($oldCart)
  {
    if($oldCart) {
      $this->items = $oldCart->items;
      $this->totalQty = $oldCart->totalQty;
      $this->totalPrice = $oldCart->totalPrice;
    }
  }

public function add($item, $id, $qty)
{
    $this->update();

    $discountedPrice = $item->sale_price;

    if ($item->discount > 0 && $item->start_date <= now() && $item->end_date >= now()) {
        $discountedPrice = $item->sale_price * (1 - $item->discount / 100);
    }

    if ($item->promotion_price > 0 && $item->promotion_start_date <= now() && $item->promotion_end_date >= now()) {
        $storedItem = ['qty' => 0, 'price' => $discountedPrice, 'item' => $item];
    } else {
        $storedItem = ['qty' => 0, 'price' => $item->sale_price, 'item' => $item];
    }

    if ($this->items && array_key_exists($id, $this->items)) {
        if (($this->items[$id]['qty'] + $qty) > $this->items[$id]['item']->quantity) {
            return false;
        } else {
            $storedItem = $this->items[$id];
        }
    }

    $storedItem['qty'] += $qty;

    $this->items[$id] = $storedItem;
    $this->totalQty += $qty;
    $this->totalPrice += $qty * $storedItem['price'];

    return true;
}

  public function updateItem($id, $qty) {
    $this->update();
    if($qty > $this->items[$id]['item']->quantity)
      return false;
    else {
      $increase = $qty - $this->items[$id]['qty'];
      $this->items[$id]['qty'] = $qty;
      $this->totalPrice = $this->totalPrice + $increase * $this->items[$id]['price'];
      $this->totalQty = $this->totalQty + $increase;
      return true;
    }
  }

public function update()
{
    if ($this->totalQty == 0) {
        return false;
    } else {
        $this->totalPrice = 0;

        foreach ($this->items as $key => $item) {
            $product = ProductDetail::where('product_details.id', $key)
                ->join('products', 'product_details.product_id', '=', 'products.id')
                ->select(
                    'product_details.id',
                    'product_details.product_id',
                    'product_details.color',
                    'product_details.quantity',
                    'product_details.sale_price',
                    'product_details.promotion_price',
                    'product_details.promotion_start_date',
                    'product_details.promotion_end_date',
                    'product_details.capacity',
                    'products.discount',
                    'products.start_date',
                    'products.end_date'
                )
                ->first();

            $this->items[$key]['item'] = $product;

            if ($product->discount > 0 && $product->start_date <= now() && $product->end_date >= now()) {
                // Calculate discounted price
                $discountedPrice = $product->sale_price * (1 - $product->discount / 100);
                $this->items[$key]['price'] = $discountedPrice;
            } else {
                if ($product->promotion_price > 0 && $product->promotion_start_date <= now() && $product->promotion_end_date >= now()) {
                    $this->items[$key]['price'] = $product->promotion_price;
                } else {
                    $this->items[$key]['price'] = $product->sale_price;
                }
            }

            $this->totalPrice += $this->items[$key]['price'] * $this->items[$key]['qty'];
        }

        return true;
    }
}

  public function remove($id) {
    if($this->items && array_key_exists($id, $this->items)) {
      $qty = $this->items[$id]['qty'];
      $price = $this->items[$id]['price'];
      $this->items = Arr::except($this->items, $id);
      $this->totalQty = $this->totalQty - $qty;
      $this->totalPrice = $this->totalPrice - $qty * $price;
      $this->update();
      return true;
    } else {
      return false;
    }
  }
}
