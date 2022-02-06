<?php

namespace Database\Seeders;

use App\Models\Partners\Seller;
use App\Models\Products\Product;
use App\Models\Products\ProductCategory;
use App\Models\Products\ProductCategoryClassification;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductPricing;
use App\Models\Products\ProductSubCategory;
use App\Models\Products\ProductVariantPart;
use App\Models\Products\VariantType;
use App\Models\Products\VariantValue;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    $this->command->info("Seeding:");

    $this->command->info("\t Users:");
    User::Factory(30)->create();

    $this->command->info("\t Sellers:");
    Seller::Factory(30)->create();

    $this->command->info("\t Products:");
    Product::Factory(100)->create();

    $this->command->info("\t VariantTypes:");
    VariantType::Factory(200)->create();

    $this->command->info("\t VariantValues:");
    VariantValue::Factory(400)->create();

    $this->command->info("\t ProductPricings:");
    ProductPricing::Factory(500)->create();

    $this->command->info("\t ProductVariantParts:");
    ProductVariantPart::Factory(500)->create();

    $this->command->info("\t ProductImages:");
    ProductImage::Factory(200)->create();

    $this->command->info("\t ProductCategories:");
    ProductCategory::Factory(50)->create();

    // (n^2 + n) /2 where n is (product-cats - 1)
    // In practice though provide less than n
    $this->command->info("\t ProductSubCategories:");
    ProductSubCategory::Factory(1000)->create();

    $this->command->info("\t ProductCategoryClassifications:");
    ProductCategoryClassification::Factory(1000)->create();
  }
}
