<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryClassificationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_category_classifications', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->unsignedBigInteger('product_category_id');
      $table->timestamps();
      $table->softDeletes();

      $table->unique(['product_id', 'product_category_id'], "prod_cat_class_prod_cat");
      $table->foreign('product_id')->references('id')->on('products');
      $table->foreign('product_category_id')->references('id')->on('product_categories');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_category_classifications');
  }
}
