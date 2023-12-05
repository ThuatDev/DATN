<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{ protected $fillable = ['name', 'category_id']; // Thêm 'category_id' vào fillable

    public function products() {
      return $this->hasMany('App\Models\Product');
    }
  public function category()
    {
            return $this->belongsTo(Category::class);
    }
}
