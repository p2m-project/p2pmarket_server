<?php

namespace Database\Factories\Products;

use App\Models\Products\Product;
use App\Models\Products\VariantType;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantTypeFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = VariantType::class;

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
      "name" => $this->faker->unique()->words(2, true),
      "product_id" => $this->faker->randomElement($products),
    ];
  }
}
