<?php

namespace App\Models\Products;

use App\Transformers\Products\ProductImageTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
  // TODO: Check if it really neads to be softdeleted
  use HasFactory, SoftDeletes;

  public $transformer = ProductImageTransformer::class;

  protected $fillable = [
    'image',
    'type',
    'product_id',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
