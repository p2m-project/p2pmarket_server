<?php

namespace App\Transformers\Products;

use App\Models\Products\VariantType;
use League\Fractal\TransformerAbstract;

class VariantTypeTransformer extends TransformerAbstract
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
  public function transform(VariantType $variantType)
  {
    return [
      "id" => (int)$variantType->id,
      "name" => (string)$variantType->name,
      "product_id" => (int)$variantType->product_id,
      "created_at" => $variantType->created_at,
      "updated_at" => $variantType->updated_at,
      "deleted_at" => $variantType->deleted_at,
    ];
  }
}
