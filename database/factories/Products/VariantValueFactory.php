<?php

namespace Database\Factories\Products;

use App\Models\Products\VariantType;
use App\Models\Products\VariantValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantValueFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = VariantValue::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $variantTypes = VariantType::all()
      ->pluck("id")
      ->toArray();
    return [
      "value" => $this->faker->unique()->words(2, true),
      "variant_type_id" => $this->faker->randomElement($variantTypes),
    ];
  }
}
