<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPricing extends Model
{
  use HasFactory, SoftDeletes;

  // public $

  protected $fillable = [
    "price",
    "product_id",
    "upc",
    "sku"
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
