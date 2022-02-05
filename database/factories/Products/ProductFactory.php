<?php

namespace Database\Factories\Products;

use App\Models\Partners\Seller;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Product::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $sellers = Seller::all()
      ->pluck('user_id')
      ->toArray();
    return [
      "name" => $this->faker->words(2, true),
      "description" => $this->faker->paragraph(5),
      "seller_user_id" => $this->faker->randomElement($sellers),
    ];
  }
}
