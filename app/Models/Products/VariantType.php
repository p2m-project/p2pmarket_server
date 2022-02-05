<?php

namespace App\Models\Products;

use App\Transformers\Products\VariantTypeTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantType extends Model
{
  use HasFactory, SoftDeletes;

  public $transformer = VariantTypeTransformer::class;

  protected $fillable = [
    'name',
    'product_id',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function variantValue()
  {
    return $this->hasMany(VariantValue::class);
  }
}
