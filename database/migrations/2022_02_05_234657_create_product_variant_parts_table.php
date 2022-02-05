<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantPartsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_variant_parts', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_pricing_id');
      $table->unsignedBigInteger('variant_value_id');
      $table->softDeletes();
      $table->timestamps();

      $table->unique(['product_pricing_id', 'variant_value_id']);
      $table->foreign('product_pricing_id')->references('id')->on('product_pricings');
      $table->foreign('variant_value_id')->references('id')->on('variant_values');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_variant_parts');
  }
}
