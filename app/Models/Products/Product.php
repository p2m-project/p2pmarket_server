<?php

namespace App\Models\Products;

use App\Models\Partners\Seller;
use App\Transformers\Products\ProductTranformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory, SoftDeletes;

  public $transformer = ProductTranformer::class;

  protected $fillable = [
    "name",
    "description",
    "seller_user_id",
  ];

  public function seller()
  {
    return $this->belongsTo(Seller::class, "seller_user_id");
  }

  public function variants()
  {
    return $this->hasMany(VariantType::class);
  }
}