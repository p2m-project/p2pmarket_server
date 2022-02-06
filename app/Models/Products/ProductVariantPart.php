<?php

namespace App\Models\Products;

use App\Transformers\Products\ProductVariantPartTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantPart extends Model
{
  use HasFactory, SoftDeletes;

  public $transformer = ProductVariantPartTransformer::class;

  protected $fillable = [
    "product_pricing_id",
    "variant_value_id",
  ];

  public function productPricing()
  {
    return $this->belongsTo(ProductPricing::class);
  }

  public function variantValue()
  {
    return $this->belongsTo(VariantValue::class);
  }
}
