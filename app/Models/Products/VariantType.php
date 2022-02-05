<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantType extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'name',
    'product_id',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
