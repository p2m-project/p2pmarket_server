<?php

namespace App\Http\Controllers\Products;


use App\Http\Controllers\GenericController;
use App\Models\Products\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductSubCategoryController extends GenericController
{

  public function __construct()
  {
    parent::__construct(ProductSubCategory::class, function (Request $request) {
      return [
        "parent_category_id" => [
          "required", "string",
          "exists:product_categories,id", "different:child_categories_id",
          Rule::unique("product_sub_categories", "parent_category_id")->where(
            function ($query) use ($request) {
              return $query
                // ensures this parent already exists for the passed child
                ->where("child_category_id", $request->child_category_id)
                // ensures this parent doesn't already exist as its own child. 
                // redundant but, better to not need it but have it
                ->orWhere("child_category_id", $request->parent_category_id);
            }
          ),
          // ensures the passed parent is not already a child for the passed chld
          Rule::unique("product_sub_categories", "child_category_id")->where(
            function ($query) use ($request) {
              return $query
                ->where("parent_category_id", $request->child_category_id);
            }
          ),
        ],
        "child_category_id" => [
          "required", "string",
          "exists:product_categories,id", "different:parent_categories_id",
          Rule::unique("product_sub_categories", "child_category_id")->where(
            function ($query) use ($request) {
              return $query
                ->where("parent_category_id", $request->parent_category_id)
                ->orWhere("parent_category_id", $request->child_category_id);
            }
          ),
          // ensures the passed child is not already a parent for the passed parent
          Rule::unique("product_sub_categories", "parent_category_id")->where(
            function ($query) use ($request) {
              return $query
                ->where("child_category_id", $request->parent_category_id);
            }
          ),
        ],
      ];
    }, function (Request $request, int $id) {
      return [
        "parent_category_id" => [
          "string",
          "exists:product_categories,id", "different:child_categories_id",
          Rule::unique("product_sub_categories", "parent_category_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query
                // ensures this parent already exists for the passed child
                ->where("child_category_id", $request->child_category_id)
                // ensures this parent doesn't already exist as its own child. 
                // redundant but, better to not need it but have it
                ->orWhere("child_category_id", $request->parent_category_id);
            }
          ),
          // ensures the passed parent is not already a child for the passed chld
          Rule::unique("product_sub_categories", "child_category_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query
                ->where("parent_category_id", $request->child_category_id);
            }
          ),
        ],
        "child_category_id" => [
          "string",
          "exists:product_categories,id", "different:parent_categories_id",
          Rule::unique("product_sub_categories", "child_category_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query
                ->where("parent_category_id", $request->parent_category_id)
                ->orWhere("parent_category_id", $request->child_category_id);
            }
          ),
          // ensures the passed child is not already a parent for the passed parent
          Rule::unique("product_sub_categories", "parent_category_id")->ignore($id)->where(
            function ($query) use ($request) {
              return $query
                ->where("child_category_id", $request->parent_category_id);
            }
          ),
        ],
      ];
    });
  }
}
