<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_images', function (Blueprint $table) {
      $table->id();
      $table->string('image');
      // TODO: make this an enum of possible values and add a default value
      $table->string('type')->nullable();
      $table->unsignedBigInteger('product_id');
      $table->timestamps();
      $table->softDeletes();

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
    Schema::dropIfExists('product_images');
  }
}
