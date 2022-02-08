<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\GenericController;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductController extends GenericController
{

  public function __construct()
  {
    parent::__construct(Product::class, function (Request $request) {
      return [
        "name" => "required|string",
        "description" => "string",
        "seller_user_id" => "required|integer|exists:sellers,user_id",
      ];
    }, function (Request $request, int $id) {
      return [
        "name" => "string",
        "description" => "string",
        "seller_user_id" => "integer|exists:sellers,user_id",
      ];
    });
  }
}
