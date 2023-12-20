<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['name'];
  public function getTypesAttribute()
    {
        // return $this->producers()->pluck('name')->toArray();
         return $this->producers()->get();

    }

    public function producers()
    {
        return $this->hasMany(Producer::class);
    }
}
