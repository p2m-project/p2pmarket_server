<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\GenericController;
use App\Models\Products\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductCategoryController extends GenericController
{

  public function __construct()
  {
    parent::__construct(ProductCategory::class, function (Request $request) {
      return [
        "name" => "required|string|unique:product_categories,name",
      ];
    }, function (Request $request, int $id) {
      return [
        "name" => ["string", Rule::unique("product_categories", "name")->ignore($id)],
      ];
    });
  }
}
