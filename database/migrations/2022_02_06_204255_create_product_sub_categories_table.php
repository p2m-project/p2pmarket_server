<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductSubCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_sub_categories', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('parent_category_id');
      $table->unsignedBigInteger('child_category_id');
      $table->unsignedBigInteger('subcat_a')->storedAs('least(parent_category_id, child_category_id)');
      $table->unsignedBigInteger('subcat_b')->storedAs('greatest(parent_category_id, child_category_id)');
      $table->timestamps();
      $table->softDeletes();

      $table->unique(['subcat_a', 'subcat_b']);
      // TODO: Remove this, it is redundant
      $table->unique(['parent_category_id', 'child_category_id']);
      $table->foreign('parent_category_id')->references('id')->on('product_categories');
      $table->foreign('child_category_id')->references('id')->on('product_categories');
    });

    DB::statement('ALTER TABLE product_sub_categories ADD CONSTRAINT product_sub_categories_chk_cols_not_equal CHECK (parent_category_id <> child_category_id);');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_sub_categories');
  }
}
