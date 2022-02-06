<?php

namespace Database\Factories\Products;

use App\Models\Products\Product;
use App\Models\Products\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = ProductImage::class;

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
    $images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '13.jpg'];

    return [
      "image" => $this->faker->randomElement($images),
      "type" => $this->faker->words(2, true),
      "product_id" => $this->faker->randomElement($products),
    ];
  }
}
