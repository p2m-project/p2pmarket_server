<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategoryClassification extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    "product_id",
    "product_category_id",
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function parentCategory()
  {
    return $this->belongsTo(ProductCategory::class);
  }
}
