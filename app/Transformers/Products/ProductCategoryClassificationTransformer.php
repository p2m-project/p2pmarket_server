<?php

namespace App\Transformers\Products;

use App\Models\Products\ProductCategoryClassification;
use League\Fractal\TransformerAbstract;

class ProductCategoryClassificationTransformer extends TransformerAbstract
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
  public function transform(ProductCategoryClassification $productCategoryClassification)
  {
    return [
      "id" => (int)$productCategoryClassification->id,
      "product_id" => (int)$productCategoryClassification->product_id,
      "product_category_id" => (int)$productCategoryClassification->product_category_id,
      "created_at" => $productCategoryClassification->created_at,
      "updated_at" => $productCategoryClassification->updated_at,
      "deleted_at" => $productCategoryClassification->deleted_at,
    ];
  }
}
