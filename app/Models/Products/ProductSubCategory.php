<?php

namespace App\Models\Products;

use App\Transformers\Products\ProductSubCategoryTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubCategory extends Model
{
  use HasFactory, SoftDeletes;

  public $transformer = ProductSubCategoryTransformer::class;

  protected $fillable = [
    "parent_category_id",
    "child_category_id",
  ];

  public function parentCategory()
  {
    return $this->belongsTo(ProductCategory::class, "parent_category_id");
  }

  public function childCategory()
  {
    return $this->belongsTo(ProductCategory::class, "child_category_id");
  }
}
