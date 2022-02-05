<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_pricings', function (Blueprint $table) {
      $table->id();
      $table->unsignedDecimal('price', 12, 2);
      $table->unsignedBigInteger('product_id');
      $table->string('upc')->unique()->nullable();  // universal product code
      $table->string('sku')->unique()->nullable();  // stock keeping unit
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('product_id')->references('id')->on('products');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_pricings');
  }
}
