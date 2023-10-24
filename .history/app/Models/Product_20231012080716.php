<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'producer_id', 'name', 'image', 'sku_code', 'monitor', 'front_camera', 'rear_camera', 'CPU', 'GPU',
        'RAM', 'ROM', 'OS', 'pin', 'information_details', 'product_introduction', 'rate',
    ];

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function productVotes()
    {
        return $this->hasMany(ProductVote::class);
    }
}
