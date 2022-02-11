<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\ApiController;
use App\Models\Products\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productImages = ProductImage::all();
    return $this->showAll($productImages);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Products\ProductImage  $productImage
   * @return \Illuminate\Http\Response
   */
  public function show(ProductImage $productImage)
  {
    return $this->showOne($productImage);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Products\ProductImage  $productImage
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ProductImage $productImage)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Products\ProductImage  $productImage
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductImage $productImage)
  {
    $productImage->delete();
    return $this->showOne($productImage);
  }
}
