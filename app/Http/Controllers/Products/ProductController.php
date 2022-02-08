<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

  public function __construct()
  {
    parent::__construct(VariantType::class, function (Request $request) {
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
