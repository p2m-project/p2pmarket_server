<?php

namespace Database\Factories\Partners;

use App\Models\Partners\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Seller::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $users = User::all()
      ->pluck('id')
      ->toArray();
    return [
      "user_id" => $this->faker->unique()->randomElement($users),
    ];
  }
}
