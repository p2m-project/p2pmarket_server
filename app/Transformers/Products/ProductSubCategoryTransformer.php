<?php

namespace App\Transformers\Products;

use App\Models\Products\ProductSubCategory;
use League\Fractal\TransformerAbstract;

class ProductSubCategoryTransformer extends TransformerAbstract
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
  public function transform(ProductSubCategory $productSubCategory)
  {
    return [
      "id" => (int)$productSubCategory->id,
      "parent_category_id" => (int)$productSubCategory->parent_category_id,
      "child_category_id" => (int)$productSubCategory->child_category_id,
      "created_at" => $productSubCategory->created_at,
      "updated_at" => $productSubCategory->updated_at,
      "deleted_at" => $productSubCategory->deleted_at,
    ];
  }
}
