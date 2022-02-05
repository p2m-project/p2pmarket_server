<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantValuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('variant_values', function (Blueprint $table) {
      $table->id();
      $table->string('value');
      $table->unsignedBigInteger('variant_type_id');
      $table->timestamps();
      $table->softDeletes();

      $table->unique(['value', 'variant_type_id']);
      $table->foreign('variant_type_id')->references('id')->on('variant_types');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('variant_values');
  }
}
