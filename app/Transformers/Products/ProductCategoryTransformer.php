<?php

namespace App\Transformers\Products;

use App\Models\Products\ProductCategory;
use League\Fractal\TransformerAbstract;

class ProductCategoryTransformer extends TransformerAbstract
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
  public function transform(ProductCategory $productCategory)
  {
    return [
      "id" => (int)$productCategory->id,
      "name" => (string)$productCategory->name,
      "created_at" => $productCategory->created_at,
      "updated_at" => $productCategory->updated_at,
      "deleted_at" => $productCategory->deleted_at,
    ];
  }
}
