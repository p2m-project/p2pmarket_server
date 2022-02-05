<?php

namespace App\Transformers\Products;

use App\Models\Products\ProductPricing;
use League\Fractal\TransformerAbstract;

class ProductPricingTransformer extends TransformerAbstract
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
  public function transform(ProductPricing $productPricing)
  {
    return [
      "id" => (int)$productPricing->id,
      "price" => (float)$productPricing->price,
      "product_id" => (int)$productPricing->product_id,
      "upc" => (string)$productPricing->upc,
      "sku" => (string)$productPricing->sku,
      "created_at" => $productPricing->created_at,
      "updated_at" => $productPricing->updated_at,
      "deleted_at" => $productPricing->deleted_at,
    ];
  }
}
