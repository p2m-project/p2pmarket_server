<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantTypesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('variant_types', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedBigInteger('product_id');
      $table->timestamps();
      $table->softDeletes();

      $table->unique(['name', 'product_id']);
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
    Schema::dropIfExists('variant_types');
  }
}
