<?php

namespace App\Transformers\Products;

use App\Models\Products\ProductImage;
use League\Fractal\TransformerAbstract;

class ProductImageTransformer extends TransformerAbstract
{
  /**
   * List of resources to automatically include
   *
   * @var array
   */
  protected $defaultIncludes = [
    //
  ];

  /**
   * List of resources possible to include
   *
   * @var array
   */
  protected $availableIncludes = [
    //
  ];

  /**
   * A Fractal transformer.
   *
   * @return array
   */
  public function transform(ProductImage $productImage)
  {
    return [
      "id" => (int)$productImage->id,
      "image" => (string)$productImage->image,
      "type" => (string)$productImage->type,
      "product_id" => (int)$productImage->product_id,
      "created_at" => $productImage->created_at,
      "updated_at" => $productImage->updated_at,
      "deleted_at" => $productImage->deleted_at,
    ];
  }
}
