<?php

namespace App\Transformers\Products;

use App\Models\Products\VariantValue;
use League\Fractal\TransformerAbstract;

class VariantValueTransformer extends TransformerAbstract
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
  public function transform(VariantValue $variantValue)
  {
    return [
      "id" => (int)$variantValue->id,
      "value" => (string)$variantValue->value,
      "variant_type_id" => (int)$variantValue->variant_type_id,
      "created_at" => $variantValue->created_at,
      "updated_at" => $variantValue->updated_at,
      "deleted_at" => $variantValue->deleted_at,
    ];
  }
}
