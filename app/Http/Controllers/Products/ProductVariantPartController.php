<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\GenericController;
use App\Models\Products\ProductVariantPart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductVariantPartController extends GenericController
{
  public function __construct()
  {
    parent::__construct(ProductVariantPart::class, function (Request $request) {
      return [
        "product_pricing_id" => [
          "required", "integer", "exists:product_pricings,id",
          Rule::unique("product_variant_parts", "product_pricing_id")->where(
            function ($query) use ($request) {
              return $query->where("variant_value_id", $request->variant_value_id);
            }
          )
        ],
        "variant_value_id" => [
          "required", "integer", "exists:variant_values,id",
          Rule::unique("product_variant_parts", "variant_value_id")->where(
            function ($query) use ($request) {
              return $query->where("product_pricing_id", $request->product_pricing_id);
            }
          )
        ],
      ];
    }, function (Request $request, int $id) {
      return [
        "product_pricing_id" => [
          "integer", "exists:product_pricings,id",
          Rule::unique("product_variant_parts", "product_pricing_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query->where("variant_value_id", $request->variant_value_id);
            }
          )
        ],
        "variant_value_id" => [
          "integer", "exists:variant_values,id",
          Rule::unique("product_variant_parts", "variant_value_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query->where("product_pricing_id", $request->product_pricing_id);
            }
          )
        ],
      ];
    });
  }
}
