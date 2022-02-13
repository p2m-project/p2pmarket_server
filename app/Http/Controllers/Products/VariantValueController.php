<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\GenericController;
use App\Models\Products\VariantValue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VariantValueController extends GenericController
{

  public function __construct()
  {
    parent::__construct(VariantValue::class, function (Request $request) {
      return [
        "value" => [
          "required", "string",
          Rule::unique("variant_values", "value")->where(
            function ($query) use ($request) {
              return $query->where("variant_type_id", $request->variant_type_id);
            }
          )
        ],
        "variant_type_id" => [
          "required", "integer", "exists:variant_types,id",
          Rule::unique("variant_values", "variant_type_id")->where(
            function ($query) use ($request) {
              return $query->where("value", $request->value);
            }
          )
        ],
      ];
    }, function (Request $request, int $id) {
      return [
        "value" => [
          "string",
          Rule::unique("variant_values", "value")->ignore($id)->where(
            function ($query) use ($request) {
              return $query->where("variant_type_id", $request->variant_type_id);
            }
          )
        ],
        "variant_type_id" => [
          "integer", "exists:variant_types,id",
          Rule::unique("variant_values", "variant_type_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query->where("value", $request->value);
            }
          )
        ],
      ];
    });
  }
}
