<?php

namespace Database\Factories\Products;

use App\Models\Products\ProductPricing;
use App\Models\Products\ProductVariantPart;
use App\Models\Products\VariantValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantPartFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProductVariantPart::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $productPricings = ProductPricing::all()
      ->pluck("id")
      ->toArray();
    $variantValues = VariantValue::all()
      ->pluck("id")
      ->toArray();

    $productPricing_variantValue = [];;
    foreach ($productPricings as $productPricing) {
      foreach ($variantValues as $variantValue) {
        array_push($productPricing_variantValue, $productPricing . "-" . $variantValue);
      }
    }

    $pricing_and_variant = $this->faker->unique()->randomElement($productPricing_variantValue);
    $pricing_and_variant = explode('-', $pricing_and_variant);
    $productPricing = $pricing_and_variant[0];
    $variantValue = $pricing_and_variant[1];

    return [
      "product_pricing_id" => $productPricing,
      "variant_value_id" => $variantValue,
    ];
  }
}
