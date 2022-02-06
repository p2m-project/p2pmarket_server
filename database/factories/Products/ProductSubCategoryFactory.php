<?php

namespace Database\Factories\Products;

use App\Models\Products\ProductCategory;
use App\Models\Products\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSubCategoryFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProductSubCategory::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $productPricings = ProductCategory::all()
      ->pluck("id")
      ->toArray();

    $parent_children = [];
    for ($i = 0; $i < count($productPricings); $i++) {
      for ($j = 0; $j < count($productPricings); $j++) {
        if ($j > $i) {
          array_push($parent_children, $productPricings[$i] . "-" . $productPricings[$j]);
        }
      }
    }
    // print(count($parent_children));
    // print("\n");

    $parent_child = $this->faker->unique()->randomElement($parent_children);
    $parent_child = explode('-', $parent_child);
    $parent = $parent_child[0];
    $child = $parent_child[1];

    return [
      "parent_category_id" => $parent,
      "child_category_id" => $child,
    ];
  }
}
