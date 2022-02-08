<?php

namespace App\Http\Controllers\Products;


use App\Http\Controllers\GenericController;
use App\Models\Products\VariantType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VariantTypeController extends GenericController
{

  public function __construct()
  {
    parent::__construct(VariantType::class, function (Request $request) {
      return [
        "name" => [
          "required", "string",
          Rule::unique("variant_types", "name")->where(
            function ($query) use ($request) {
              return $query->where("product_id", $request->product_id);
            }
          )
        ],
        "product_id" => [
          "required", "integer", "exists:products,id",
          Rule::unique("variant_types", "product_id")->where(
            function ($query) use ($request) {
              return $query->where("name", $request->name);
            }
          )
        ],
      ];
    }, []);
  }
}
