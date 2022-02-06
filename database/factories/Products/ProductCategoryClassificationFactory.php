<?php

namespace Database\Factories\Products;

use App\Models\Products\Product;
use App\Models\Products\ProductCategory;
use App\Models\Products\ProductCategoryClassification;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryClassificationFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProductCategoryClassification::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $products = Product::all()
      ->pluck("id")
      ->toArray();
    $productCats = ProductCategory::all()
      ->pluck("id")
      ->toArray();

    $product_productCat = [];;
    foreach ($products as $product) {
      foreach ($productCats as $productCat) {
        array_push($product_productCat, $product . "-" . $productCat);
      }
    }

    $product_and_productCat = $this->faker->unique()->randomElement($product_productCat);
    $product_and_productCat = explode('-', $product_and_productCat);
    $product = $product_and_productCat[0];
    $productCat = $product_and_productCat[1];

    return [
      "product_id" => $product,
      "product_category_id" => $productCat,
    ];
  }
}
