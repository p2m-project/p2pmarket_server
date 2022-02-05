<?php

namespace App\Transformers\Products;

use League\Fractal\TransformerAbstract;
use App\Models\Products\Product;

class ProductTranformer extends TransformerAbstract
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
  public function transform(Product $product)
  {
    return [
      "id" => (int)$product->id,
      "name" => (string)$product->name,
      "description" => (string)$product->description,
      "seller_user_id" => (int)$product->seller_user_id,
      "created_at" => $product->created_at,
      "updated_at" => $product->updated_at,
      "deleted_at" => $product->deleted_at,
    ];
  }
}
