<?php

namespace App\Transformers\Products;

use App\Models\Products\ProductVariantPart;
use League\Fractal\TransformerAbstract;

class ProductVariantPartTransformer extends TransformerAbstract
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
  public function transform(ProductVariantPart $productVariantPart)
  {
    return [
      "id" => (int)$productVariantPart->id,
      "product_pricing_id" => (int)$productVariantPart->product_pricing_id,
      "variant_value_id" => (int)$productVariantPart->variant_value_id,
      "created_at" => $productVariantPart->created_at,
      "updated_at" => $productVariantPart->updated_at,
      "deleted_at" => $productVariantPart->deleted_at,
    ];
  }
}
