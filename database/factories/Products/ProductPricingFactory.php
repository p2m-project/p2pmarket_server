<?php

namespace Database\Factories\Products;

use App\Models\Products\Product;
use App\Models\Products\ProductPricing;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPricingFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProductPricing::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $products = Product::all()
      ->pluck('id')
      ->toArray();

    return [
      "price" => $this->faker->randomFloat(2, 1, 20_000),
      "product_id" => $this->faker->randomElement($products),
      "upc" => $this->faker->unique()->ean13(),
      "sku" => $this->faker->unique()->regexify('[A-Z]{5}[1-9]{3}'), // e.g 'ABCDE123'
    ];
  }
}
