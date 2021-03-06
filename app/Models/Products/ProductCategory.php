<?php

namespace App\Models\Products;

use App\Transformers\Products\ProductCategoryTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
  use HasFactory, SoftDeletes;

  public $transformer = ProductCategoryTransformer::class;

  protected $fillable = [
    "name"
  ];

  public function subCategoryParents()
  {
    return $this->hasMany(ProductSubCategory::class, "parent_category_id");
  }

  public function subCategoryChildren()
  {
    return $this->hasMany(ProductSubCategory::class, "child_category_id");
  }


  public function productCategoryClassifications()
  {
    return $this->hasMany(ProductCategoryClassification::class);
  }
}
