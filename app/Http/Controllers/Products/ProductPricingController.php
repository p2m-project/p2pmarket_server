<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\GenericController;
use App\Models\Products\ProductPricing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductPricingController extends GenericController
{

  public function __construct()
  {
    parent::__construct(ProductPricing::class, function (Request $request) {
      return [
        "price" => "required|numeric",
        "product_id" => "required|integer|exists:products,id",
        "upc" => "string|unique:product_pricings,upc",
        "sku" => "string|unique:product_pricings,sku",
      ];
    }, function (Request $request, int $id) {
      return [
        "price" => "numeric",
        "product_id" => "integer|exists:products,id",
        "upc" => [
          "string",
          Rule::unique("product_pricings", "upc")->ignore($id)
        ],
        "sku" => [
          "string",
          Rule::unique("product_pricings", "sku")->ignore($id)
        ],
      ];
    });
  }
}
