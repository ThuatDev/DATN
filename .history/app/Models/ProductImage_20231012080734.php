<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_detail_id', 'image_name'];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
