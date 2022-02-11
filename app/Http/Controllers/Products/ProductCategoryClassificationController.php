<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\GenericController;
use App\Models\Products\ProductCategoryClassification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductCategoryClassificationController extends GenericController
{
  public function __construct()
  {
    parent::__construct(ProductCategoryClassification::class, function (Request $request) {
      return [
        "product_id" => [
          "required", "integer", "exists:products,id",
          Rule::unique("product_category_classifications", "product_id")->where(
            function ($query) use ($request) {
              return $query->where("product_category_id", $request->product_category_id);
            }
          )
        ],
        "product_category_id" => [
          "required", "integer", "exists:product_categories,id",
          Rule::unique("product_category_classifications", "product_category_id")->where(
            function ($query) use ($request) {
              return $query->where("product_id", $request->product_id);
            }
          )
        ],
      ];
    }, function (Request $request, int $id) {
      return [
        "product_id" => [
          "integer", "exists:products,id",
          Rule::unique("product_category_classifications", "product_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query->where("product_category_id", $request->product_category_id);
            }
          )
        ],
        "product_category_id" => [
          "integer", "exists:product_categories,id",
          Rule::unique("product_category_classifications", "product_category_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query->where("product_id", $request->product_id);
            }
          )
        ],
      ];
    });
  }
}
