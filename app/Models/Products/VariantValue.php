<?php

namespace App\Models\Products;

use App\Transformers\Products\VariantValueTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantValue extends Model
{
  use HasFactory, SoftDeletes;

  public $transformer = VariantValueTransformer::class;

  protected $fillable = [
    'value',
    'variant_type_id',
  ];

  public function variantType()
  {
    return $this->belongsTo(VariantType::class);
  }
}
